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

function getTmpCart(array $cart): string
{
    $_SESSION["cart"]["tmpCart"] = NULL;
    foreach ($cart as $id => $detail) {
        $qty = (int)testInput($detail["qty"] ?? "");
        $delivery = testInput($detail["transport"] ?? "");
        if ($qty > 0) {
            $_SESSION["cart"]["tmpCart"][$id]["qty"] = $qty;
            $_SESSION["cart"]["tmpCart"][$id]["transport"] = $delivery;
        }
    }
    return saveTmpCart();
}

function saveTmpCart(): string
{
    if ($_SESSION["cart"]["tmpCart"] == NULL) {
        $_SESSION["error"]["cart"]["validation"] = "Votre Panier est vide";
        return "catalogue";
    }

    include_once './Data/multidimensional-catalog.php';

    foreach ($_SESSION["cart"]["tmpCart"] as $id => $detail) {
        $qty = $detail["qty"];
        $delivery = $detail["delivery"];
        if (isset($products[$id], $transport[$delivery])) {
            $_SESSION["cart"][$id]["qty"] += $qty;
            $_SESSION["cart"][$id]["transport"] = $transport;
        }
    }
    return "cart";
}

function submitContactForm(array $form): void
{
    $_SESSION["contactForm"] = NULL;

    foreach ($form as $field => $value) {
        $_SESSION["contactForm"][$field] = testInput($value);
    }

    checkContactForm();
}

function checkContactForm(): void
{
    $_SESSION["error"]["contactForm"] = NULL;

    if (!filter_var($_SESSION["contactForm"]["mail"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["error"]["contactForm"]["mail"] = "Adresse mail invalide";
    }

    if (strlen($_SESSION["contactForm"]["message"]) < 5) {
        $_SESSION["error"]["contactForm"]["message"] = "Le message est trop court";
    }

    foreach (["nom", "mail", "message"] as $field) {
        if ($_SESSION["contactForm"][$field] == NULL) {
            $_SESSION["error"]["contactForm"][$field] = "Champ requis";
        }
    }

    if ($_FILES["fichier"]["size"] > 0) {
        $check = getimagesize($_FILES["fichier"]["tmp_name"]);
        if ($check == false) {
            $_SESSION["error"]["contactForm"]["fichier"]["type"] = "Ce fichier n'est pas une image.";
        }
        if ($_FILES["fichier"]["size"] > 500000) {
            $_SESSION["error"]["contactForm"]["fichier"]["size"] = "Votre image est trop lourde.";
        }
        $imageFileType = strtolower(pathinfo($_FILES["fichier"]["name"], PATHINFO_EXTENSION));
        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            $_SESSION["error"]["contactForm"]["fichier"]["extension"] = "Les extensions autorisées sont JPG, JPEG, PNG, GIF.";
        }
    }

    if (!$_SESSION["error"]["contactForm"]) {
        saveContactForm();
    }
}

function saveContactForm(): void
{
    if ($_FILES["fichier"]["size"] > 0) {
        saveAttachFile();
    }

    saveTextContent();
}

function saveTextContent(): void
{
    $textContent = formatTextContent();

    $OK = file_put_contents('storage/contactForm.txt', $textContent, FILE_APPEND | LOCK_EX);

    if ($OK) {
        $_SESSION["contactForm"] = NULL;
        $_SESSION["validation"]["contactForm"]["textContent"] = "Votre formulaire a bien été envoyé.";
    } else {
        $_SESSION["error"]["contactForm"]["textContent"]["validation"] = "Le formulaire n'a pas pu être envoyé. Veuillez contacter l'administrateur.";
    }
}

function saveAttachFile(): void
{
    $target_file = "storage/attachFiles/" . date("Y-m-d") . "-" . date("h-i-s") . "-" . basename($_FILES["fichier"]["name"]);

    $OK = move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file);

    if ($OK) {
        $_SESSION["validation"]["contactForm"]["fichier"] = "Votre pièce jointe a bien été envoyée.";
        $_SESSION["contactForm"]["fichier"] = $target_file;
    } else {
        $_SESSION["error"]["contactForm"]["fichier"]["validation"] = "La pièce jointe n'a pas pu être envoyée.";
    }
}

function resetContactForm(): void
{
    $_SESSION["contactForm"] = NULL;
    $_SESSION["error"]["contactForm"] = NULL;
}

function formatTextContent(): string
{
    $separator = "------------------------------------------\n";
    $fileContent =
        "\n \n $separator $separator START OF CONTACT FORM \n $separator" .
        "Formulaire de contact envoyé depuis Hike and Camp \n" .
        "Date : " . date("l d.m.Y") . " à " . date("h:i") . "\n $separator";

    echo "<br> formating <br>";
    var_dump($_SESSION["contactForm"]);
    foreach ($_SESSION["contactForm"] as $field => $value) {
        $fileContent .= "$field : \n $value \n $separator";
    }
    $fileContent .= "$separator END OF CONTACT FORM \n $separator $separator";

    return $fileContent;
}
