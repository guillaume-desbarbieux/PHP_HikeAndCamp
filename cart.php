<?php
include 'multidimensional-catalog.php';
include 'my-functions.php';

$item = [
    "title" => "Votre panier",
    "meta_description" => "Vous êtes sur le point de finaliser la réservation votre séjour de rêve !",
];

include 'header.php';
?>


<main id="ancre">
    <div id="blocDescription">
        <div class="row justify-content-center">
            <h1 class="ms-4">Votre panier</h1>
            <?php
            foreach ($products as $item) {
                if ($_POST[$item["name"]]) {
                    $night = $_POST[$item["name"]];
                    $livraison = transport_price($_POST["transport"], $item["distance"]);
                    $price = discountedPrice($item["prix"] * $night);
                    $total = $price + $livraison;
                    $TVA = priceVAT($total);
                    include 'item_cart.php';
                }
            }
            ?>
        </div>
    </div>
</main>

<?php
include 'footer.php';
?>