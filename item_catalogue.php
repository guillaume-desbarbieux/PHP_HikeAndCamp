<div class="row justify-content-center">
    <div class="col-12 col-xl-5 mt-2">
        <div class="row m-0 img-fluid border border-dark border-3 rounded-5 p-1">
            <div class="col-8 d-flex justify-content-center align-items-center ">
                <div class="ratio ratio-4x3 m-2">
                    <img class='img-fluid object-fit-cover border border-warning border-3 rounded-2'
                        src=<?php echo $item["image"]["url"] ?> alt=<?php echo $item["image"]["description"] ?> title=<?php echo $item["titre"] ?>>
                </div>
            </div>
            <div class="col-4 d-flex flex-column align-items-center">
                <h3 class="row fs-4"><?php echo $item["titre"] ?></h3>
                <h4 class="row fs-6"><?php echo $item["note"] ?></h4>
                <h4 class="row fs-6"><?php formatPrice($item["prix"]); ?> (TTC)</h4>
                <h5 class="row fs-6"><?php formatPrice($item["prix"]); ?> (HT)</h5>
                <div class="row d-flex m-1 w-100">
                    <a href="#formulaire_reservation" class="btn btn-success m-auto" role="button">Réserver</a>
                </div>
                <div class="row d-flex m-1 w-100">
                    <a href="<?php echo $item["page"] ?>" class='btn btn-outline-success m-auto' role='button'>Voir</a>

                </div>
            </div>
        </div>
    </div>

</div>