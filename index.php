<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
session_start();

include './Data/multidimensional-catalog.php';
include './Data/my-functions.php';

$page = $_GET["page"] ?? "accueil";

if (array_key_exists($page, $products)) {

    $pageInfo = $item = $products[$page];
    include './Templates/header.php';
    include './Templates/item_details.php';
    include './Templates/footer.php';
} else {
    include "./$page.php";
}
