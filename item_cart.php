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


             <h3 class="row fs-6">Pour <?= $night ?> nuits</h3>
             <h3 class="row fs-6"><?php discountedPrice($night * $item["prix"], $item["discount"]); ?> (TTC)</h3>
             <h6 class="row fs-6"><?php priceExcludingVAT($night * $item["prix"], $item["discount"]); ?> (HT) + <?php priceVAT($night * $item["prix"], $item["discount"]); ?> (TVA)</h6>



                 <a href="<?php echo $item["page"] ?>" class='btn btn-outline-success m-auto' role='button'>Voir les détails</a>
         </div>

     </div>
 </div>