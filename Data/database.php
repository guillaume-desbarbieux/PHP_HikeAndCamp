<?php


function sendQueryToDatabase(string $query, array $param): array
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
    $answer->execute($param);
    $answer = $answer->fetchAll();
    return $answer ?? [];
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
    return sendQueryToDatabase("SELECT * from $table", []);
}

function listTodayOrders(): array
{

    return sendQueryToDatabase("SELECT * FROM orders WHERE (date = DATE(NOW())) ORDER BY number DESC ", []);
}

function listProductsFromOrder(int $id): array
{
    $query =
        "SELECT products.name, order_product.quantity, products.price
         FROM products
         INNER JOIN order_product
         ON products.id = order_product.product_id
         AND order_product.order_id = :id";

    return sendQueryToDatabase($query, [":id" => $id]);
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
        AND customers.id = :id
        GROUP BY orders.number";

    return sendQueryToDatabase($query, [":id" => $id]);
}

function sendNewOrder(object $order): array
{
    $query =
        "INSERT INTO `orders` ( `customer_id`, `discount_name`, `delivery_mode_id`, `totalPrice`, `created_at`)
         VALUES ( :customer_id, :discount_name, :delivery_id, :totalPrice, NOW());

         INSERT INTO order_products (order_id, product_id, quantity)
         VALUES ";

    foreach ($order->listProducts as $id_product => $quantity) {
        if ($quantity > 0) {
        $query .= "(LAST_INSERT_ID(), $id_product , $quantity),";
        }
    }
    $query = rtrim($query, ",") . ";";
    
    return sendQueryToDatabase($query, [
        ":customer_id" => $order->customer_id,
        ":discount_name" => $order->discount_name,
        ":delivery_id" => $order->delivery_id,
        ":totalPrice" => $order->totalPrice
    ]);
}

function addNewProduct(object $product): string
{
    // Check if the product already exists
    $existingProducts = sendQueryToDatabase("SELECT * FROM products WHERE name = :name", [":name" => $product->name]);
    if (count($existingProducts) > 0) {
        return "Product already exists.";
    }
    // Prepare the SQL query to insert the new product
    // Note: Ensure that the values are properly sanitized to prevent SQL injection
    $product->name = htmlspecialchars($product->name);
    $product->description = htmlspecialchars($product->description);
    $product->url_image = htmlspecialchars($product->url_image);
    $product->weight = (int)$product->weight;
    $product->stock = (int)$product->stock;
    $product->is_available = (int)$product->is_available; // Convert boolean to integer (1 or 0)
    $product->price = (int)$product->price; // Ensure price is an integer
    $product->id_category = (int)$product->id_category; // Ensure category ID is an integer
    if ($product->id_category < 1) {
        $product->id_category = 1; // Default category ID
    }
    if ($product->weight < 0) {
        $product->weight = 0; // Default weight
    }
    if ($product->stock < 0) {
        $product->stock = 0; // Default stock
    }
    if ($product->price < 0) {
        $product->price = 0; // Default price
    }
    if ($product->is_available !== 0 && $product->is_available !== 1) {
        $product->is_available = 1; // Default to available
    }
    if ($product->url_image === "") {
        $product->url_image = "https://www.shutterstock.com/image-vector/default-ui-image-placeholder-wireframes-600nw-1037719192.jpg"; // Default image URL
    }
    if ($product->description === "") {
        $product->description = "Description à compléter"; // Default description
    }
    if ($product->name === "") {
        return "Product name cannot be empty.";
    }
    if ($product->price === 0) {
        return "Product price cannot be zero.";
    }
    if ($product->stock === 0) {
        return "Product stock cannot be zero.";
    }


    $query =
        "INSERT INTO `products` 
        (`category_id`,
        `name`,
        `description`,
        `price`,
        `url_image`,
        `weight`,
        `stock`,
        `is_available`,
        `meta_description`,
        `adress`,
        `note`,
        `url_maps`)
        VALUES
        (:id_category,
        :name,
        :description,
        :price,
        :url_image,
        :weight,
        :stock,
        :is_available,
        :meta_description,
        :adress,
        :note,
        :url_maps);";

    sendQueryToDatabase($query, [
        ":id_category" => $product->id_category,
        ":name" => $product->name,
        ":description" => $product->description,
        ":price" => $product->price,
        ":url_image" => $product->url_image,
        ":weight" => $product->weight,
        ":stock" => $product->stock,
        ":is_available" => $product->is_available,
        ":meta_description" => $product->meta_description,
        ":adress" => $product->adress,
        ":note" => $product->note,
        ":url_maps" => $product->url_maps
    ]);
    // Return a success message
    return  "Product added successfully.";
}

function findProductById(int $id): array
{
    $query = "SELECT * FROM products WHERE id = :id";
    $result = sendQueryToDatabase($query, [":id" => $id]);
    return $result ? $result[0] : [];
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
        $productsInfo = listAllContent("products")[0];
        $deliveryInfo = listAllContent("deliveries")[0];
        $discount = sendQueryToDatabase('SELECT discount_percentage, discount_fix FROM discount_code WHERE name = :discount', [":discount" => $this->discount_name]);
        $discount = $discount[0];
        $totalPrice = 0;
        $totalWeight = 0;
        foreach ($this->listProducts as $item => $qty) {
            $totalPrice += $qty * $productsInfo[$item]["price"];
            $totalWeight += $qty * $productsInfo[$item]["weight"];
            print_r($productsInfo);
        }
                $totalPrice = (int) ($totalPrice * (1 - $discount["discount_percentage"] / 100) - $discount["discount_fix"]);
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
    public $meta_description;
    public $adress;
    public $note;
    public $url_maps;

    public function __construct(
        string $name,
        int $price,
        int $id_category = 1,
        string $description = "description à compléter",
        string $url_image = "https://www.shutterstock.com/image-vector/default-ui-image-placeholder-wireframes-600nw-1037719192.jpg",
        int $weight = 0,
        int $stock = 1,
        bool $is_available = true,
        string $adress = "",
        string $note = "",
        string $url_maps = ""
    ) {
        $this->id_category = $id_category;
        $this->name = htmlspecialchars($name);
        $this->description = htmlspecialchars($description);
        $this->price = $price;
        $this->url_image = htmlspecialchars($url_image);
        $this->weight = $weight;
        $this->stock = $stock;
        $this->is_available = $is_available;
        $this->meta_description = "Achetez " . $this->name . " à partir de " . ($this->price / 100) . "€ !";
        $this->adress = $adress;
        $this->note = $note;
        $this->url_maps = $url_maps;
    }
}
