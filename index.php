<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
*/

require_once './Data/multidimensional-catalog.php';
require_once './Data/my-functions.php';
require_once './Data/database.php';

$page = $_GET["page"] ?? "accueil";
$page = testInput($page);

if ($_POST["submitCart"]) {
    $page = saveCart($_POST);
}

if ($_POST["emptyCart"]) {
    emptyCart();
}

if ($_POST["submitContactForm"]) {
    submitContactForm($_POST);
}

if ($_POST["resetContactForm"]) {
    resetContactForm();
}

if ($_POST["submitProduct"]) {
    $product = new Product(
        htmlspecialchars($_POST["nom"]),
        (int)$_POST["prix"],
        (int)$_POST["categorie"],
        htmlspecialchars($_POST["description"]),
        htmlspecialchars($_POST["image"]),
        (int)$_POST["poids"],
        (int)$_POST["stock"],
        isset($_POST["disponible"]) ? 1 : 0
    );
    echo addNewProduct($product);
}


if (array_key_exists($page, $products)) {
    $pageInfo = $item = $products[$page];
    require_once './Templates/header.php';
    require_once './Templates/item_details.php';
    require_once './Templates/footer.php';
} else {

    if (is_file($page . ".php")) {
        require_once "./$page.php";
    } else {
        require_once "./404.php";
    }
}
