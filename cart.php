<?php
include './Data/multidimensional-catalog.php';
include './Data/my-functions.php';

$page = [
    "title" => "Votre panier",
    "meta_description" => "Vous êtes sur le point de finaliser la réservation votre séjour de rêve !",
];

include './Templates/header.php';
?>


<main id="ancre">
    <div id="blocDescription">
        <div class="row justify-content-center">
            <h1 class="ms-4">Votre panier</h1>
            <?php
            foreach ($products as $item) {
                if ($_POST[$item["name"]]["night"] != "") {
                    $night = $_POST[$item["name"]]["night"];
                    $transport = $_POST[$item["name"]]["transport"];
                    $price = discountedPrice($item["prix"] * $night);
                    $TVA = priceVAT($price);
                    $livraison = transport_price($transport, $item["distance"]);
                    $total = $price + $livraison;
                    require './Templates/item_cart.php';
                }
            }
            ?>
        </div>
    </div>
</main>

<?php
include './Templates/footer.php';
?>