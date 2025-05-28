<?php


function sendQueryToDatabase(string $query): array
{
     var_dump($query);
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

function sendNewOrder(int $id_customer, array $listProducts, $id_delivery = 1): array
{
    $number = rand();
    $query =
        "INSERT INTO `orders` ( `customer_id`, `delivery_mode_id`, `total_amount`, `date`, `number`)
         VALUES ( $id_customer,     $id_delivery,	0,	DATE(NOW()), $number);

         INSERT INTO order_product (order_id, product_id, quantity)
         VALUES ";

    foreach ($listProducts as $id_product => $quantity) {
        $query .= "(LAST_INSERT_ID(), $id_product , $quantity),";
    }
    $query = rtrim($query, ",") . ";";

    return sendQueryToDatabase($query);
}

function addNewProduct(array $product): array
{
    $name = htmlspecialchars($product["name"]);
    $description = htmlspecialchars($product["description"]);
    $price = htmlspecialchars($product["price"]);
    $url_image = htmlspecialchars($product["url_image"]);
    $weight = htmlspecialchars($product["weight"]);
    $quantity = htmlspecialchars($product["quantity"]);
    $is_available = htmlspecialchars($product["is_available"]);
    $id_category = htmlspecialchars($product["id_category"]);
    $id_tva = htmlspecialchars($product["id_tva"]);

    $query =
        "INSERT INTO `products` 
        (`category_id`,
        `vat_id`,
        `name`,
        `description`,
        `price`,
        `url_image`,
        `weight`,
        `quantity`,
        `is_available`)
        VALUES
        ('$id_category',
        '$id_tva',
        '$name',
        '$description',
        '$price',
        '$url_image',
        '$weight',
        '$quantity',
        '$is_available');";
   
    return sendQueryToDatabase($query);
}

?>