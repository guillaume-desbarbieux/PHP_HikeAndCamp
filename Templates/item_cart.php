 <div class="col-12 col-xl-4 mt-2">
     <div class="row m-0 img-fluid border border-dark border-3 rounded-5 p-1">
         <div class="col-6 d-flex justify-content-center align-items-center ">
             <div class="ratio ratio-4x3 m-2">
                 <img class='img-fluid object-fit-cover border border-warning border-3 rounded-2'
                     src=<?= $product["url_image"] ?> alt=<?= $product["name"] ?> title=<?= $product["name"] ?>>
             </div>
         </div>
         <div class="col-6 d-flex flex-column align-items-center">
             <h3 class="row fs-4"><?= $product["name"] ?></h3>
             <h4 class="row fs-6"><?= formatPrice($product["price"]); ?>/nuit</h4>
             <h3 class="row fs-6">Pour <?= $qty ?> <?= $qty > 1 ? "nuits" : "nuit" ?></h3>
             <h3 class="row fs-6">Prix :<?= formatPrice($qty * $product["price"]) ?></h3>
         </div>
     </div>
 </div>