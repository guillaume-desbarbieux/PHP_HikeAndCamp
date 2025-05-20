<?php
function formatPrice(int $price) {
echo ($price/100)."€";
}

function priceExcludingVAT(int $price, int $discount = 0) {
return formatPrice((100-$discount)*$price/120);
}

function priceVAT(int $price, int $discount = 0) {
return formatPrice((100-$discount)*$price*0.002);
}

function discountedPrice(int $price, int $discount = 0) {
return formatPrice((100-$discount)*$price/100);
}

function test_input ($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}


?>