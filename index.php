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

if ($products[$page]) {
    $pageInfo = $item = $products[$page];
    require_once './Templates/header.php';
    require_once './Templates/item_details.php';
    require_once './Templates/footer.php';
} else {
    require_once "./$page.php";
}
