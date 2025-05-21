 <div class="col-12 col-xl-4 mt-2">
     <div class="row m-0 img-fluid border border-dark border-3 rounded-5 p-1">
         <div class="col-6 d-flex justify-content-center align-items-center ">
             <div class="ratio ratio-4x3 m-2">
                 <img class='img-fluid object-fit-cover border border-warning border-3 rounded-2'
                     src=<?= $products[$article]["image"]["url"] ?> alt=<?= $products[$article]["image"]["description"] ?> title=<?= $products[$article]["titre"] ?>>
             </div>
         </div>
         <div class="col-6 d-flex flex-column align-items-center">
             <h3 class="row fs-4"><?= $products[$article]["titre"] ?></h3>
             <h4 class="row fs-6"><?php formatPrice($invoice["unitPrice"]); ?>/nuit</h4>
             <h3 class="row fs-6">Pour <?= $invoice["quantity"] ?> <?= $invoice["quantity"] > 1 ? "nuits" : "nuit" ?></h3>
             <h3 class="row fs-6">Logement :<?php formatPrice($invoice["discountPrice"]) ?></h3>
             <h6 class="row fs-6">Prix HT :<?php formatPrice($invoice["excludingTVA"]) ?></h6>
             <h6 class="row fs-6">TVA :<?php formatPrice($invoice["TVA"]) ?></h6>

             <?php
                if ($invoice["deliveryMode"]) {
                    echo "<h6 class='row fs-6'>Transport en ", $invoice["deliveryMode"], " : ", formatPrice($invoice["deliveryPrice"]), "</h6>";
                }
                ?>
             <h6 class="row fs-6">Total :<?php formatPrice($invoice["total"]) ?></h6>


         </div>
     </div>
 </div>