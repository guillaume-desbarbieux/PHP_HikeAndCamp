<?php
$pageInfo = [
    "title" => "Votre panier",
    "meta_description" => "Vous êtes sur le point de finaliser la réservation votre séjour de rêve !",
];

require_once './Templates/header.php';

?>

<main id="ancre">
    <div id="blocDescription">
        <div class="row justify-content-center">
            <?php
            if (!$_SESSION["cart"]) {
                echo "<div class='d-none'>";
            }
            ?>
            <h1 class="ms-4 text-center">Votre panier</h1>
            <form method="POST">
                <div class="row d-flex m-auto w-25 justify-content-center">
                    <input type='submit' class='btn btn-danger m-auto' name='emptyCart' value='Vider le panier'>
                    <input type='submit' class='btn btn-success m-auto' name='sendOrder' value='Valider le panier'>
                </div>
            </form>
            <?php
            if (!$_SESSION["cart"]) {
                echo "</div>";
            }
            ?>

            <?php
            // affichage du panier
            $facture = 0;
            $products = listAllContent("products");
            foreach ($_SESSION["cart"] as $id => $qty) {
                if ($qty > 0) {
                    $product = findProductById($id);

                    $facture += $qty* $product["price"];
                    require './Templates/item_cart.php';
                }
            }
            if ($facture == 0) {
                echo "<h2 class='text-center'>Votre panier est vide :'(</h2>";
            } else {
                echo "<h2 class='text-center'>Votre facture totale est de ", formatPrice($facture), "</h2>";
                if ($facture > 1000000) {
                    echo "<h2 class='text-center bg-danger w-auto'>!!  La CB va chauffer  !!</h2>";
                }
            }
            ?>

        </div>
</main>

<?php
require_once './Templates/footer.php';
?>