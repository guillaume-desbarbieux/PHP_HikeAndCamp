<?php
$pageInfo = [
    "title" => "Page catalogue de Hike & Camp",
    "meta_description" => "Choisissez votre spot idéal pour un bivouac inoubliable !",
];

require_once './Templates/header.php';

?>


<main id="ancre">

    <!-- Nos produits -->
    <div id="blocDescription">
        <div class="row justify-content-center">
            <h1 class="ms-4 text-center">Nos meilleures ventes</h1>
            <form method="post">
                <div class="row d-flex m-auto w-25 justify-content-center">
                    <input type="submit" class="btn btn-success m-auto" name="submitCart" value="Ajouter au panier">
                    <?php
                    if ($_SESSION["error"]["cart"] == "empty") {
                        $_SESSION["error"]["cart"] = NULL;
                        echo "<h3 class='text-center bg-danger w-auto mt-1'>Rien à ajouter au panier</h3>";
                    }
                    ?>
                </div>
                <div class="row justify-content-center">
                    <?php
                    $products = listAllContent("products");
                    if (empty($products)) {
                        echo "<h3 class='text-center bg-danger w-auto mt-1'>Aucun produit disponible</h3>";
                    }

                    foreach ($products as $item) {
                        require './Templates/item_catalogue.php';
                    }
                    ?>
                </div>

            </form>
        </div>
    </div>
</main>

<?php

require_once './Templates/footer.php';

?>