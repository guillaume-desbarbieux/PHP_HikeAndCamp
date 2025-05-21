<?php
include './Data/multidimensional-catalog.php';
include './Data/my-functions.php';

$item = $products["servieres"];
$page = $item;
include './Templates/header.php';
include './Templates/item_details.php';
include './Templates/footer.php';

?>
