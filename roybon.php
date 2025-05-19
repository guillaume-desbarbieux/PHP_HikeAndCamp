<?php

$title = "Cabane De Roybon";
$meta_description = "Hike and Camp - Page de réservation pour la Cabane de Roybon, Villard de Lans";
include 'header.php';
?>

<main id="blocDescription" class="position-relative">

    <h1 class="text-center">Cabane de Roybon - 1450m</h1>
    <h4 class="text-center">38250 Villard de Lans</h4>


    <!-- Section Prix, avis et boutons-->
    <section class="container">
        <div class="row g-0 m-1 h-100">
            <div class="col-xl-4">
                <h4 class="text-center">50€/Nuit</h4>
            </div>
            <div class="col-xl-4 mb-2 d-flex justify-content-center">
                <a href="#formulaire_reservation" class="btn btn-success m-auto" role="button">Reserver</a>
            </div>
            <div class="col-xl-4">
                <h4 class="text-center">⭐⭐⭐⭐⭐</h4>
            </div>
        </div>
    </section>


    <!-- Section photo et carte -->
    <section class="container">
        <div class="row g-4">
            <div class="col-xl-6">
                <div class="ratio ratio-4x3">
                    <img class="w-100 border border-warning border-3 rounded-2" src="./Images/lieux/roybon.jpeg"
                        alt="Cabane du Roybon">
                </div>
            </div>

            <div class="col-xl-6">
                <iframe class="w-100 h-100 border border-warning border-3 rounded-2"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2818.6133292530353!2d5.584070376612646!3d45.05306796077566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478a9159ac30d5fb%3A0x33c7485dbf361975!2sCabane%20de%20Roybon!5e0!3m2!1sfr!2sfr!4v1743587497155!5m2!1sfr!2sfr"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <!-- section description -->
    <section class="container my-3">
        <p>La cabane des Clots, également appelée cabane de Roybon, est un refuge non gardé situé à environ
            1 450 mètres d'altitude dans le Parc Naturel Régional du Vercors. Accessible uniquement à pied,
            elle offre une capacité d'accueil d'environ 15 personnes sur des bat-flancs superposés. La
            cabane dispose de volets aux fenêtres, de tables à l'intérieur et à l'extérieur, ainsi que d'une
            cheminée fonctionnelle mais pouvant enfumer l'intérieur si le feu n'est pas correctement
            positionné au fond. Une source d'eau, la fontaine de Roybon, se trouve à proximité immédiate,
            bien que son débit puisse varier selon la saison. Les toilettes sèches sont généralement bien
            entretenues. Il est recommandé aux visiteurs d'apporter leur propre bois de chauffage, car la
            disponibilité sur place peut être limitée.
        </p>
    </section>

    <!-- Section réservation -->
    <div class="container position-absolute  translate-middle-x bottom-0 start-50 mb-3 ">
        <div id="formulaire_reservation"
            class="container border border-black border-5 rounded-5 p-1 bg-primary w-75">
            <form class="position-relative" action="https://httpbin.org/post" method="post">
                <a class="btn btn-close position-absolute top-0 end-0 mt-3 me-4" href="#blocDescription"
                    role="button"></a>
                <h2 class="text-center mb-4">Cabane du Roybon</h2>

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


<?php include 'footer.php'; ?>