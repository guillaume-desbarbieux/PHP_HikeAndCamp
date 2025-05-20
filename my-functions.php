<?php
function formatPrice(int $price) {
echo ($price/100)."€";
}

function priceExcludingVAT(int $price, int $discount = 0) {
return formatPrice((100-$discount)*$price/120);
}

function discountedPrice(int $price, int $discount = 0) {
return formatPrice((100-$discount)*$price/100);
}
?>