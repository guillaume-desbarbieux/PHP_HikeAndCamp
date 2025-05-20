<div class="col-12 col-xl-5 mt-2">
    <div class="row m-0 img-fluid border border-dark border-3 rounded-5 p-1">
        <div class="col-8 d-flex justify-content-center align-items-center ">
            <div class="ratio ratio-4x3 m-2">
                <img class='img-fluid object-fit-cover border border-warning border-3 rounded-2'
                    src=<?php echo $item["image"]["url"] ?> alt=<?php echo $item["image"]["description"] ?> title=<?php echo $item["titre"] ?>>
            </div>
        </div>
        <div class="col-4 d-flex flex-column align-items-center">
            <h3 class="row fs-4"><?php echo $item["title"] ?></h3>
            <h4 class="row fs-6"><?php echo $item["note"] ?></h4>
            <h4 class="row fs-6"><?php discountedPrice($item["prix"], $item["discount"]); ?> (TTC)</h4>
            <h5 class="row fs-6"><?php priceExcludingVAT($item["prix"], $item["discount"]); ?> (HT)</h5>
            <!-- Bouton accès ancien formulaire de réservation -->
            <!-- <div class="row d-flex m-1 w-100">
                    <a href="#formulaire_reservation" class="btn btn-success m-auto" role="button">Réserver</a>
                </div> -->
            <div class="row d-flex m-1 w-100">
                <a href="<?php echo $item["page"] ?>" class='btn btn-outline-success m-auto' role='button'>Voir les détails</a>
            </div>
            <form method="post" action="cart.php">
                <label for="nights">Nombre de nuits :</label>
                <input type="number" id="nights" name=<?= $item["name"] ?> min="1" max="10" required />

                <fieldset>
                    <label>Moyen de transport</label>

                    <div>
                        <input type="radio" id="Jet" name="transport" value="jet" checked />
                        <label for="jet">Jet privé</label>
                    </div>

                    <div>
                        <input type="radio" id="Taxi" name="transport" value="taxi" />
                        <label for="Taxi">Taxi</label>
                    </div>

                    <div>
                        <input type="radio" id="Marche" name="transport" value="marche" />
                        <label for="Marche">Marche à pied</label>
                    </div>
                </fieldset>


                <div class="row d-flex m-1 w-100">
                    <input type="submit" class="btn btn-success m-auto" name="submit" value="Ajouter au panier">
                </div>
            </form>

        </div>
    </div>
</div>