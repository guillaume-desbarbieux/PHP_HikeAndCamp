<?php
function formatPrice(int $price) {
echo ($price/100)."€";
}

function priceExcludingVAT(int $price) {
return formatPrice(100*$price/120);
}

?>