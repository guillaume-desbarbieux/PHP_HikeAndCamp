<?php
function formatPrice(int $price): string
{
    $price /= 100;
    $centimes = $price % 1 == 0 ? 0 : 2;

    return number_format($price, $centimes, ",", " ") . "€";
}

function priceExcludingVAT(int $price): float
{
    return ($price * 0.8);
}

function priceVAT(int $price): float
{
    return ($price * 0.2);
}

function discountedPrice(int $price, int $discount = 0): int
{
    return ((1 - $discount / 100) * $price);
}

function testInput(string $data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function priceTransport(string $transport, int $distance): int
{
    $cout = 0;

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


function emptyCart(): void
{
    $_SESSION["cart"] = NULL;
}

function invoiceCommand(string $item, int $quantity, string $deliveryMode): array
{
    include './Data/catalog-with-keys.php';

    foreach ($products as $article) {
        if ($article["name"] == $item) {
            $invoice = [
                "name" => $article["name"],
                "unitPrice" => $article["price"],
                "quantity" => $quantity,
                "deliveryMode" => $deliveryMode,
                "groupPrice" => $unitPrice * $quantity,
                "discountPrice" => discountedPrice($invoice["groupPrice"], $article["discount"]),
                "excludingTVA" => priceExcludingVAT($invoice["discountPrice"]),
                "TVA" => $invoice["discountPrice"] - $invoice["excludingTVA"],
                "deliveryPrice" => priceTransport($transport, $article["distance"]),
                "total" => $invoice["discountPrice"] + $invoice["deliveryPrice"],
            ];
            return $invoice;
        }
    }
    return [];
}
