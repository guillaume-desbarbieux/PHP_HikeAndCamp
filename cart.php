<?php
include 'multidimensional-catalog.php';
include 'my-functions.php';

$page = [
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
                    $price = discountedPrice($item["prix"] * $night);
                    $TVA = priceVAT($price);
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