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

/*
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
*/

$blabla = new Order(1, [1=>5, 4=>2, 3=>10]);
echo "<br> blabla <br>";
var_dump($blabla);
sendNewOrder($blabla);

/*
$bateau = new Product ("Bateau", 10000, 1, "Bateau de luxe", "https://www.artiemhotels.com/uploads/5f4e933a-d8bf-458c-a630-1fb64a66ffa8/5f4e933a-d8bf-458c-a630-1fb64a66ffa8.jpeg", 1000, 10, true);
$train = new Product ("Train", 50000, 1, "Train à vapeur", "https://www.artiemhotels.com/uploads/5f4e933a-d8bf-458c-a630-1fb64a66ffa8/5f4e933a-d8bf-458c-a630-1fb64a66ffa8.jpeg", 2000, 5, true);
$camion = new Product ("Camion", 30000, 1, "Camion de livraison", "https://www.artiemhotels.com/uploads/5f4e933a-d8bf-458c-a630-1fb64a66ffa8/5f4e933a-d8bf-458c-a630-1fb64a66ffa8.jpeg", 1500, 20, true);
$helicoptere = new Product ("Hélicoptère", 200000, 1, "Hélicoptère de secours", "https://www.artiemhotels.com/uploads/5f4e933a-d8bf-458c-a630-1fb64a66ffa8/5f4e933a-d8bf-458c-a630-1fb64a66ffa8.jpeg", 500, 2, true);

addNewProduct($train);
addNewProduct($bateau);
addNewProduct($camion);
addNewProduct($helicoptere);
*/


////// Fin des tests //////



require_once './Templates/footer.php';
