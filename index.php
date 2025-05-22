<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

session_start();

require_once './Data/multidimensional-catalog.php';
require_once './Data/my-functions.php';

$page = $_GET["page"] ?? "accueil";

if ($_POST["submitCart"]) {
    if (isCartEmpty($_POST)) {
        $page = "catalogue";
        $_SESSION["error"] = ["cart" => "empty"];
    } else {
        foreach ($_POST as $name => $command) {
            if (isset($command["night"])) {
                $_SESSION["cart"][$name]["quantity"] += (int) $command["night"];
                $_SESSION["cart"]["$name"]["transport"] = $command["transport"];
            }
        }
        $page = "cart";
    }
}

if ($_POST["emptyCart"]) {
    emptyCart();
}

if ($products[$page]) {
    $pageInfo = $item = $products[$page];
    require_once './Templates/header.php';
    require_once './Templates/item_details.php';
    require_once './Templates/footer.php';
} else {
    require_once "./$page.php";
}

?>