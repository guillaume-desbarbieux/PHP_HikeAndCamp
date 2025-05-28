<?php
$pageInfo = [
    "title" => "Page de Tests",
    "meta_description" => "à vous de jouer",
];
require_once './Templates/header.php';

////// Début des tests //////




// $answer = listAllContent("customers");

//$answer = listTodayOrders();

//$answer = listProductsFromOrder(4);

//$answer = listOrdersFromCustomer(1);

//sendNewOrder(3,[2=>3,5=>8], 1);

//arrayToHTML($answer);


$kayak = [
    'name' => "Kayak",
    "description" => "Kayak réversible et insubmersible !",
    "price" => 78,
    "url_image" => "https://www.artiemhotels.com/uploads/5f4e933a-d8bf-458c-a630-1fb64a66ffa8/5f4e933a-d8bf-458c-a630-1fb64a66ffa8.jpeg",
    "weight" => 456,
    "quantity" => 10,
    "is_available" => 1,
    "id_category" => 2,
    "id_tva" => 3,
];
var_dump($kayak);

addNewProduct($kayak);

////// Fin des tests //////



require_once './Templates/footer.php';
