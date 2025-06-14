<div class="col-12 col-xl-5 mt-2">
    <div class="row m-0 img-fluid border border-dark border-3 rounded-5 p-1">
        <div class="col-8 d-flex justify-content-center align-items-center ">
            <div class="ratio ratio-4x3 m-2">
                <img class='img-fluid object-fit-cover border border-warning border-3 rounded-2'
                    src=<?= $item["url_image"] ?> alt=<?= $item["name"] ?> title=<?= $item["name"] ?>>
            </div>
        </div>
        <div class="col-4 d-flex flex-column align-items-center">
            <h3 class="row fs-4"><?= $item["name"] ?></h3>
            <h4 class="row fs-6"><?= $item["note"] ?></h4>
            <h4 class="row fs-6"><?= formatPrice($item["price"]); ?>/nuit</h4>
            <h5 class="row fs-6"><?= formatPrice(priceExcludingVAT($item["price"])); ?> (HT)</h5>
            <div class="row d-flex m-1 w-100">
                <a href="?page=<?= $item["page"] ?>" class='btn btn-outline-success m-auto' role='button'>Voir les détails</a>
            </div>

            <label for="nights">Nombre de nuits :</label>
            <input type="number" id="nights" name="<?= $item["id"] ?>" min="1" max="10" />
        </div>
    </div>
</div>