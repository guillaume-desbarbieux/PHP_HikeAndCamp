<div class="col-12 col-xl-5 mt-2">
    <div class="row m-0 img-fluid border border-dark border-3 rounded-5 p-1">
        <div class="col-8 d-flex justify-content-center align-items-center ">
            <div class="ratio ratio-4x3 m-2">
                <img class='img-fluid object-fit-cover border border-warning border-3 rounded-2'
                    src=<?= $item["image"]["url"] ?> alt=<?= $item["image"]["description"] ?> title=<?= $item["titre"] ?>>
            </div>
        </div>
        <div class="col-4 d-flex flex-column align-items-center">
            <h3 class="row fs-4"><?php echo $item["title"] ?></h3>
            <h4 class="row fs-6"><?php echo $item["note"] ?></h4>
            <h4 class="row fs-6"><?php formatPrice(discountedPrice($item["prix"], $item["discount"])); ?>/nuit</h4>
            <h5 class="row fs-6"><?php formatPrice(priceExcludingVAT($item["prix"])); ?> (HT)</h5>
            <!-- Bouton accès ancien formulaire de réservation -->
            <!-- <div class="row d-flex m-1 w-100">
                    <a href="#formulaire_reservation" class="btn btn-success m-auto" role="button">Réserver</a>
                </div> -->
            <div class="row d-flex m-1 w-100">
                <a href="<?= $item["page"] ?>" class='btn btn-outline-success m-auto' role='button'>Voir les détails</a>
            </div>

            <label for="nights">Nombre de nuits :</label>
            <input type="number" id="nights" name="<?= $item["name"] . "['night']" ?>" min="1" max="10" />
            <label for="transport">Moyen de transport :</label>
            <select name="<?= $item["name"] . "['transport']" ?>">
                <option value="">--Please choose an option--</option>
                <option value="jet">Jet privé</option>
                <option value="taxi">Taxi</option>
                <option value="marche">Marche</option>
            </select>



        </div>
    </div>
</div>