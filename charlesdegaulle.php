<?php
include './Data/multidimensional-catalog.php';
include './Data/my-functions.php';

$item = $products["charlesdegaulle"];
$page = $item;
include './Templates/header.php';
include './Temlates/item_details.php';
include './Templates/footer.php';

?>
