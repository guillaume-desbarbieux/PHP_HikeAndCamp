<?php


function sendQueryToDatabase(string $query): array
{
    try {
        $mysqlClient = new PDO(
            'mysql:host=localhost;dbname=hikeandcamp;charset=utf8',
            'test',
            'a',

            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $answer = $mysqlClient->prepare($query);
    $answer->execute();

    return $answer->fetchAll();
}

function arrayToHTML(array $array): void
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            arrayToHTML($value);
        } else {
            if (!is_int($key)) {
                echo "<div>Clé : $key <br></div>";
            } else {
                echo "<div>Valeur : $value <br></div>";
            }
        }
    }
}

function listAllContent(string $table): array
{
    return sendQueryToDatabase("SELECT * from $table");
}

function listTodayOrders(): array
{

    return sendQueryToDatabase("SELECT* FROM orders WHERE (date = DATE(NOW())) ORDER BY number DESC ");
}

function listProductsFromOrder(int $id): array
{
    $query =
        "SELECT products.name, order_product.quantity, products.price
         FROM products
         INNER JOIN order_product
         ON products.id = order_product.product_id
         AND order_product.order_id = $id";

    return sendQueryToDatabase($query);
}

function listOrdersFromCustomer(int $id): array
{
    $query =
        "SELECT orders.number, SUM(order_product.quantity*products.price)
        FROM products
        INNER JOIN order_product
        INNER JOIN orders
        INNER JOIN customers 
        ON products.id = order_product.product_id
        AND order_product.order_id = orders.id
        AND orders.customer_id = customers.id
        AND customers.id = $id
        GROUP BY orders.number";

    return sendQueryToDatabase($query);
}

function sendNewOrder(object $order): array
{
    $query =
        "INSERT INTO `orders` ( `customer_id`, `discount_name`, `delivery_mode_id`, `totalPrice`, `created_at`)
         VALUES ( $order->customer_id, $order->discount_name, $order->delivery_id, $order->totalPrice, NOW());

         INSERT INTO order_products (order_id, product_id, quantity)
         VALUES ";

    foreach ($order->listProducts as $id_product => $quantity) {
        $query .= "(LAST_INSERT_ID(), $id_product , $quantity),";
    }
    $query = rtrim($query, ",") . ";";

    return sendQueryToDatabase($query);
}

function addNewProduct(object $product): array
{
    $query =
        "INSERT INTO `products` 
        (`category_id`,
        `name`,
        `description`,
        `price`,
        `url_image`,
        `weight`,
        `stock`,
        `is_available`)
        VALUES
        ('$product->id_category',
        '$product->name',
        '$product->description',
        '$product->price',
        '$product->url_image',
        '$product->weight',
        '$product->stock',
        '$product->is_available');";

    return sendQueryToDatabase($query);
}

class Order
{

    public $customer_id;
    public $listProducts;
    public $delivery_id;
    public $discount_name;
    public $totalPrice;
    public $totalWeight;

    public function __construct(int $customer_id, array $listProducts, int $delivery_id = 1, string $discount_name = "default")
    {
        $this->customer_id = $customer_id;
        $this->listProducts = $listProducts;
        $this->delivery_id = $delivery_id;
        $this->discount_name = $discount_name;
        $total = $this->calculateTotalPriceAndWeight();
        $this->totalPrice = $total["Price"];
        $this->totalWeight = $total["Weight"];
    }

    public function calculateTotalPriceAndWeight()
    {
        $productsInfo = listAllContent("products");
        $deliveryInfo = listAllContent("deliveries");
        $discount = sendQueryToDatabase('SELECT discount_percentage, discount_fix FROM discount_code WHERE name = "' . $this->discount_name . '";');
        $discount = $discount[0];
        $totalPrice = 0;
        $totalWeight = 0;
        echo "<br> Discount Info <br>";
        var_dump($discount);
        foreach ($this->listProducts as $item => $qty) {
            $totalPrice += $qty * $productsInfo[$item]["price"];
            $totalWeight += $qty * $productsInfo[$item]["weight"];
        }
        $totalPrice = (int) ($totalPrice * (1 - $discount["discount_percentage"]/100) - $discount["discount_fix"]);
        return ["Price" => $totalPrice, "Weight" => $totalWeight];
    }
}

class Product
{
    public $id_category;
    public $name;
    public $description;
    public $price;
    public $url_image;
    public $weight;
    public $stock;
    public $is_available;

    public function __construct(
        string $name,
        int $price,
        int $id_category = 1,
        string $description = "description à compléter",
        string $url_image = "https://www.shutterstock.com/image-vector/default-ui-image-placeholder-wireframes-600nw-1037719192.jpg",
        int $weight = 0,
        int $stock = 1,
        bool $is_available = true
    ) {
        $this->id_category = $id_category;
        $this->name = htmlspecialchars($name);
        $this->description = htmlspecialchars($description);
        $this->price = $price;
        $this->url_image = htmlspecialchars($url_image);
        $this->weight = $weight;
        $this->stock = $stock;
        $this->is_available = $is_available;
    }
}
