<?php
include 'catalog-with-keys.php';

$item = [
    "title" => "Page catalogue de Hike & Camp",
    "meta_description" => "Choisissez votre spot idéal pour un bivouac inoubliable !",
];

include 'header.php';
?>

<main id="ancre">
    <div class="position-fixed z-3  m-0 translate-middle-x start-50 w-75 mb-3">
        <form id="formulaire_reservation" method="post" action="https://httpbin.org/post et" class="bg-primary p-2 border border-black border-5 rounded-5">
            <a href="#ancre" role="button" class="btn btn-close position-absolute end-0 me-3"></a>
            <div class="row justify-content-around">
                <div class="col-12 col-xl-4 mt-3 text-center">
                    <h4 class="form-label fw-bold">Nom</h4>
                    <input type="text" name="Nom" class="form-control" placeholder="Entrez votre nom" required>
                </div>
                <div class="col-12 col-xl-4 mt-3 text-center">
                    <h4 form-label fw-bold>Mail</h4>
                    <input type="email" name="Mail" class="form-control" placeholder="Entrez votre mail" required>
                </div>
            </div>
            <div class="row justify-content-around mt-3 text-center">
                <div class="col-12 col-xl-4">
                    <h4 form-label fw-bold>Date d'arrivée</h4>
                    <input type="date" class="form-control" name="DateArrivee">
                </div>
                <div class="col-12 col-xl-4">
                    <h4 form-label fw-bold>Date de départ</h4>
                    <input type="date" class="form-control" name="DateDepart">
                </div>
            </div>
            <div class="row justify-content-center mt-3 text-center">
                <div class="col-3 m-1">
                    <button type="reset" class="btn btn-danger">Effacer</button>
                </div>
                <div class="col-3 m-1">
                    <button type="submit" class="btn btn-success">Payer</button>
                </div>
            </div>
        </form>
    </div>


    <!-- Nos produits -->
    <div id="blocDescription">
        <div>
            <h1 class="ms-4">Nos meilleurs produits</h1>
        </div>
        <?php

        foreach ($products as $item) {
            include 'item_catalogue.php';
        }
        ?>
    </div>
</main>

<?php

include 'footer.php';

?>