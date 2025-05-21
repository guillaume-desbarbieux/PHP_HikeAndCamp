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
            var_dump ($_POST);
            foreach ($products as $item) {
                
                echo "\n";
                //var_dump($item["name"]);
                echo "\n";
                if ($_POST[$item["name"]]) {
                    $night = $_POST[$item["name"]]["night"];
                    $price = discountedPrice($item["prix"] * $night);
                    $TVA = priceVAT($price);
                    $livraison = transport_price($_POST[$item["name"]["transport"]], $item["distance"]);
                    $total = $price + $livraison;
                    include './Templates/item_cart.php';
                }
            }
            ?>
        </div>
    </div>
</main>

<?php
include './Templates/footer.php';
?>