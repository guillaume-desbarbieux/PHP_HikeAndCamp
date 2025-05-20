<main id="blocDescription" class="position-relative">


    <h1 class="text-center"><?php echo $item["titre"] ?></h1>
    <h4 class="text-center"><?php echo $item["lieu"] ?></h4>


    <!-- Section Prix, avis et boutons-->
    <section class="container">
        <div class="row g-0 m-1 h-100">
            <div class="col-xl-4">
                <h4 class="text-center"><?php formatPrice($item["prix"]) ?>/Nuit</h4>
            </div>
            <div class="col-xl-4 mb-2 d-flex justify-content-center">
                <a href="#formulaire_reservation" class="btn btn-success m-auto" role="button">Réserver</a>
            </div>
            <div class="col-xl-4">
                <h4 class="text-center"><?php echo $item["note"] ?></h4>
            </div>
        </div>
    </section>


    <!-- Section photo et carte -->
    <section class="container">
        <div class="row g-4">
            <div class="col-xl-6">
                <div class="ratio ratio-4x3">
                    <img class="w-100 border border-warning border-3 rounded-2" src=<?php echo $item["image"]["url"] ?> alt=<?php echo $item["image"]["description"] ?>>
                </div>
            </div>

            <div class="col-xl-6">
                <iframe class='w-100 h-100 border border-warning border-3 rounded-2' src=<?php echo $item["carte"] ?>
                    allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>
            </div>
        </div>
    </section>

    <!-- section description -->
    <section class="container my-3">
        <p><?php echo $item["description"] ?></p>
    </section>

    <!-- Section réservation -->
    <div class="container position-absolute  translate-middle-x bottom-0 start-50 mb-3 ">
        <div id="formulaire_reservation"
            class="container border border-black border-5 rounded-5 p-1 bg-primary w-75">
            <form class="position-relative" action="https://httpbin.org/post" method="post">
                <a class="btn btn-close position-absolute top-0 end-0 mt-3 me-4" href="#blocDescription"
                    role="button"></a>
                <h2 class="text-center mb-4"><?php echo $item["titre"] ?></h2>

                <div class="row">
                    <div class="mb-3 text-center col-12 col-xl-6">
                        <label for="nom" class="form-label fw-bold">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder=" Votre nom"
                            required>
                    </div>
                    <div class="mb-3 text-center col-12 col-xl-6">
                        <label for="mail" class="form-label fw-bold">Mail</label>
                        <input type="Email" class="form-control" id="mail" name="mail" placeholder=" Votre mail"
                            required>
                    </div>
                </div>


                <div class="row">
                    <div class="mb-3 text-center col">
                        <label for="start" class="form-label fw-bold">Date d'arrivée</label>
                        <input type="date" class="form-control" id="start" name="start" required>
                    </div>
                    <div class="mb-3 text-center col">
                        <label for="end" class="form-label fw-bold">Date de départ</label>
                        <input type="date" class="form-control" id="end" name="end" required>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 col-lg-6">
                        <p class="text-start fw-bold">Options</p>
                        <div class="form-check text-start ">
                            <input class="form-check-input" type="checkbox" name="option1" id="option1">
                            <label class="form-check-label" for="option1">
                                Panier de produits régionaux
                            </label>
                        </div>
                        <div class="form-check text-start">
                            <input class="form-check-input" type="checkbox" name="option2" id="option2">
                            <label class="form-check-label" for="option2">
                                Minibar All-inclusive
                            </label>
                        </div>
                        <div class="form-check text-start">
                            <input class="form-check-input" type="checkbox" name="option3" id="option3">
                            <label class="form-check-label" for="option2">
                                Feu d'artifice
                            </label>
                        </div>
                        <div class="form-check text-start">
                            <input class="form-check-input" type="checkbox" name="option4" id="option3">
                            <label class="form-check-label" for="option4">
                                Soirée observation des étoiles
                            </label>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <p class="text-start fw-bold">Paiement</p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paiement" value="cb" id="paiement1">
                            <label class="form-check-label" for="paiement1">
                                Carte Bancaire
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paiement" value="crypto"
                                id="paiement2" checked>
                            <label class="form-check-label" for="paiement2">
                                Cryptomonnaie
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paiement" value="kinder"
                                id="paiement3">
                            <label class="form-check-label" for="paiement3">
                                Kinder Schokobons
                            </label>
                        </div>
                    </div>
                </div>

                <div class="container text-center">
                    <button type="reset" class="btn btn-danger">Effacer</button>
                    <!-- <button type="submit" class="btn btn-success">Payer</button> -->
                    <a class="btn btn-success" href="#confirmation_reservation"
                        role="button">Payer</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Section confirmation de paiement -->
    <div class="container position-absolute  translate-middle-x bottom-0 start-50 mb-3 ">
        <div id="confirmation_reservation"
            class="position-relative container text-end border border-black border-5 rounded-5 p-1 pt-5 bg-primary w-75">
            <a class="btn btn-close position-absolute top-0 end-0 mt-3 me-4" href="#blocDescription"
                role="button"></a>
            <p class="text-center">Votre réservation est confirmée.</p>
            <p class="text-center">Toute l'équipe de Hike&Camp vous remercie de votre confiance !</p>
            <img class="img-fluid logo" src="./Images/Logo.png" alt="Logo Hike&Camp">
        </div>
    </div>
</main>