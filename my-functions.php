<?php
function formatPrice(int $price)
{
    echo ($price / 100) . "€";
}

function priceExcludingVAT(int $price)
{
    return ($price * 0.8);
}

function priceVAT(int $price)
{
    return ($price * 0.2);
}

function discountedPrice(int $price, int $discount = 0)
{
    return ((1 - $discount/100) * $price);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function transport_price($transport, $distance)
{
    if ($transport == "jet") {
        $cout = 10000;
    };

    if ($transport == "taxi") {
        $cout = 1000;
    };

    if ($transport == "marche") {
        $cout = 10;
    };

    // si moins de 10km, pas de frais de transport. Moins de 100km, prix au km selon transport. Plus de 100km, prix fixe de 150km !
    if ($distance < 10) {
        $livraison = 0;
    } elseif ($distance < 100) {
        $livraison = $cout * $distance;
    } else {
        $livraison = 150 * $cout;
    };
    return $livraison;
}

?>