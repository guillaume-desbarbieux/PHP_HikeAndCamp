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
    include './Data/multidimensional-catalog.php';
    foreach ($products as $product => $detail) {
        if ($product == $item) {
            $groupPrice = $detail["prix"] * $quantity;
            $discountPrice = discountedPrice($groupPrice, $detail["discount"]);
            $excludingTVA = priceExcludingVAT($discountPrice);
            $deliveryPrice = priceTransport($deliveryMode, $detail["distance"]);

            $invoice = [
                "name" => $detail["name"],
                "unitPrice" => $detail["prix"],
                "quantity" => $quantity,
                "deliveryMode" => $deliveryMode,
                "groupPrice" => $groupPrice,
                "discountPrice" => $discountPrice,
                "excludingTVA" => $excludingTVA,
                "TVA" => $discountPrice - $excludingTVA,
                "deliveryPrice" => $deliveryPrice,
                "total" => $discountPrice + $deliveryPrice,
            ];
            return $invoice;
        }
    }
    return [];
}

function isCartEmpty(array $cart): bool
{
    include './Data/multidimensional-catalog.php';
    foreach ($products as $name => $infos) {
        if ($cart[$name]["night"] > 0)
            return false;
    }
    return true;
}

function saveCart(array $cart): string
{
    if (isCartEmpty($cart)) {
        $_SESSION["error"] = ["cart" => "empty"];
        return "catalogue";
    }

    foreach ($cart as $name => $command) {
        if (isset($command["night"])) {
            $_SESSION["cart"][$name]["quantity"] += (int) $command["night"];
            $_SESSION["cart"]["$name"]["transport"] = $command["transport"];
        }
    }
    return "cart";
}

function handleContactForm(array $form): bool
{
    foreach ($form as $field => $value) {
        $form[$field] = testInput($value);
    }

    if (!filter_var($form["mail"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"]["contactForm"] = ["mail" => "Adresse mail invalide"];
    }

    if (strlen($form["message"]) > 4 ) {
        $_SESSION["error"]["contactForm"] = ["message" => "Le message est trop court"];
    }

    foreach (["nom", "mail", "message"] as $field) {
        if ($form[$field] == NULL) {
            $_SESSION["error"]["contactForm"][$field] = "Champ requis";
        }
    }

    if ($_SESSION["error"]["contactForm"]) {
        return false;
    } else {
        // traiter les données
        return true;
    }
}
