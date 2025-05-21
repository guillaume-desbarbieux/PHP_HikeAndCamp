<?php
session_start();
include './Data/multidimensional-catalog.php';
include './Data/my-functions.php';

$page = [
    "title" => "Votre panier",
    "meta_description" => "Vous êtes sur le point de finaliser la réservation votre séjour de rêve !",
];

include './Templates/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    emptyCart();
}
?>


<main id="ancre">
    <div id="blocDescription">
        <div class="row justify-content-center">
            <h1 class="ms-4 text-center">Votre panier</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="row d-flex m-auto w-25 justify-content-center">
                    <input type="submit" class="btn btn-danger m-auto" name="submit" value="Vider le panier">
                </div>
            </form>
            <?php
            // mise à jour du panier
            foreach ($_POST as $item) {
                if ($item["night"] != "") {
                    $_SESSION["cart"][$item["name"]]["quantity"] += $item["night"];
                    $_SESSION["cart"][$item["name"]]["transport"] = $item["transport"];
                }
            }

            // affichage du panier
            foreach ($_SESSION["cart"] as $article) {  
                if ($item > 0) {
                    $invoice = invoiceCommand("$article", $article["quantity"], $article["transport"] );
                    require './Templates/item_cart.php';
                }
            }
            if (!$_SESSION["cart"]["facture"]) {
                echo "<h2 class='text-center'>Votre panier est vide :'(</h2>";
            } else {
                echo "<h2 class='text-center'>Votre facture totale est de ", formatPrice($_SESSION["cart"]["facture"]), "</h2>";
            }
            ?>

        </div>
</main>

<?php
include './Templates/footer.php';
?>