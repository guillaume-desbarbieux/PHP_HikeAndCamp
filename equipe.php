<?php
$pageInfo = [
    "title" => "Notre équipe",
    "meta_description" => "Voici les meilleurs",
];

include './Templates/header.php';
?>
<main>
    <!-- Section présentation de l'équipe -->
    <section id="blocDescription" class="text-center">
        <h2 class="display-2 mb-5 pt-5">Notre équipe</h2>

        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3 g-2 ">
                <!-- Fiche poste 1 -->
                <div class="col">
                    <div class="border border-black border-5 rounded-5 bg-primary h-100">
                        <a class="text-dark text-decoration-none" href="?page=elric">
                            <img class="img-fluid h-80 rounded-5" src="./Images/photo_elric.png"
                                alt="Photo de Elric Tourtel">
                            <h3>Elric Tourtel</h3>
                            <h3>Chevaucheur de Licornes</h3>
                        </a>
                    </div>
                </div>
                <!-- Fiche poste 2 -->
                <div class="col">
                    <div class="border border-black border-5 rounded-5 bg-primary h-100">
                        <a class="text-dark text-decoration-none" href="?page=geraud">
                            <img class="img-fluid rounded-5" src="./Images/photo_geraud.png"
                                alt="Photo de Geraud Clément">
                            <h3>Géraud Clément</h3>
                            <h3>Expert en HamaC++ </h3>
                        </a>
                    </div>
                </div>
                <!-- Fiche poste 3 -->
                <div class="col">
                    <div class="border border-black border-5 rounded-5 bg-primary h-100">
                        <a class="text-dark text-decoration-none" href="?page=guillaume">
                            <img class="img-fluid rounded-5" src="./Images/photo_guillaume.png"
                                alt="Photo de Guillaume Desbarbieux">
                            <h3>Guillaume Desbarbieux</h3>
                            <h3>Beta-testeur de Bivouac</h3>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section recrutement -->
    <section class="text-center">
        <h2 id="recrutement" class="display-2 m-5 pt-5">Grimpe avec nous !</h2>
        <div class="position-relative">
            <div class="container position-relative">
                <div class="row row-cols-1 row-cols-xl-3 g-2">
                    <!-- Poste 1 -->
                    <div class="col">
                        <div class="border border-black border-5 rounded-5 p-1 pb-5 h-100 position-relative ">
                            <h2 class="my-4">Développeur(se) d'application mobile</h2>
                            <h3>Mission :</h3>
                            <ul class="text-start">
                                <li>Concevoir et développer l’application Hike & Camp (iOS/Android).</li>
                                <li>Mettre en place une carte interactive avec géolocalisation des refuges, abris et
                                    zones de bivouac.</li>
                                <li>Intégrer un système de contributions utilisateurs (ajout de lieux, avis,
                                    photos).</li>
                                <li>Assurer la maintenance et les mises à jour de l’application.</li>
                            </ul>
                            <h3>Profil recherché :</h3>
                            <ul class="text-start">
                                <li>Expérience en développement mobile (React Native, Flutter ou Swift/Kotlin).</li>
                                <li>Connaissance des bases de données et API cartographiques (Google Maps,
                                    OpenStreetMap…).</li>
                                <li>Sensibilité pour le milieu outdoor et la randonnée est un plus.</li>
                            </ul>

                            <a class="btn btn-primary position-absolute translate-middle-x bottom-0 mb-2"
                                href="#formulaire_poste_1" role="button">Postule !</a>
                        </div>
                    </div>
                    <!-- Poste 2 -->
                    <div class="col">
                        <div class="border border-black border-5 rounded-5 p-1 pb-5 h-100 position-relative">
                            <h2 class="my-4">Designer UX/UI & Graphiste</h2>
                            <h3>Mission :</h3>
                            <ul class="text-start">
                                <li>Concevoir l’identité visuelle et la charte graphique de Hike & Camp.</li>
                                <li>Développer une interface intuitive et accessible pour les randonneurs et
                                    pratiquants de trails.</li>
                                <li>Travailler sur les éléments graphiques de l’application et du site web.</li>
                                <li>Collaborer avec l’équipe technique pour intégrer le design dans l’application.
                                </li>
                            </ul>
                            <h3>Profil recherché :</h3>
                            <ul class="text-start">
                                <li>Expérience en design UX/UI et outils comme Figma, Adobe XD, Sketch.</li>
                                <li>Créativité et sens de l’ergonomie pour une expérience utilisateur optimisée.
                                </li>
                                <li>Intérêt pour les applications outdoor et cartographiques.</li>
                            </ul>
                            <a class="btn btn-primary position-absolute translate-middle-x bottom-0 mb-2"
                                href="#formulaire_poste_2" role="button">Postule !</a>
                        </div>
                    </div>
                    <!-- Poste 3 -->
                    <div class="col">
                        <div class="border border-black border-5 rounded-5 p-1 pb-5 h-100 position-relative">
                            <h2 class="my-4">Chargé(e) de terrain & référencement des lieux</h2>
                            <h3>Mission :</h3>
                            <ul class="text-start">
                                <li>Identifier, répertorier et valider les refuges, abris et zones de bivouac.</li>
                                <li>Effectuer des visites sur le terrain pour collecter des informations (photos,
                                    accès, état des lieux).</li>
                                <li>Nouer des partenariats avec les gestionnaires de refuges et collectivités
                                    locales.</li>
                                <li>Alimenter la base de données avec des descriptions détaillées et à jour.</li>
                            </ul>
                            <h3>Profil recherché :</h3>
                            <ul class="text-start">
                                <li>Passionné(e) de randonnée, bivouac et sports outdoor.</li>
                                <li>Capacité à se déplacer en montagne et à travailler en autonomie.</li>
                                <li>Bonne rédaction et sens du relationnel pour les partenariats.</li>
                            </ul>
                            <a class="btn btn-primary position-absolute translate-middle-x bottom-0 mb-2"
                                href="#formulaire_poste_3" role="button">Postule !</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container position-fixed  translate-middle-x bottom-0 start-50 mb-3 ">
                <!-- Formulaire Poste 1 -->
                <div id=formulaire_poste_1 class="container border border-black border-5 rounded-5 p-1 bg-primary w-75">
                    <form class="position-relative" action="https://httpbin.org/post" method="post">
                        <a class="btn btn-close position-absolute top-0 end-0 mt-3 me-4 border border-white border-3"
                            href="#recrutement" role="button"></a>
                        <h2 class="text-center">Développeur(se) d'application mobile</h2>
                        <div class="mb-3 text-start">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder=" Votre nom">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="mail" class="form-label">Mail</label>
                            <input type="Email" class="form-control" id="mail" name="mail" placeholder=" Votre mail"
                                required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message"
                                placeholder=" Je veux faire partie de l'aventure" rows="5" required></textarea>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="fichier1" class="form-label">Pièce jointe</label>
                            <input type="file" class="form-control" id="fichier1" name="fichier"></input>
                        </div>
                        <div class="container text-center">
                            <button type="reset" class="btn btn-danger">Effacer</button>
                            <button type="submit" class="btn btn-success">Envoyer</button>
                        </div>
                    </form>
                </div>

                <!-- Formulaire Poste 2 -->
                <div id=formulaire_poste_2 class="container border border-black border-5 rounded-5 p-1 bg-primary w-75">
                    <form class="position-relative" action="https://httpbin.org/post" method="post">
                        <a class="btn btn-close position-absolute top-0 end-0 mt-3 me-4 border border-white border-3"
                            href="#recrutement" role="button"></a>
                        <h2 class="text-center">Designer UX/UI & Graphiste</h2>
                        <div class="mb-3 text-start">
                            <label for="nom2" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom2" name="nom" placeholder=" Votre nom">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="mail2" class="form-label">Mail</label>
                            <input type="Email" class="form-control" id="mail2" name="mail" placeholder=" Votre mail"
                                required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="message2" class="form-label">Message</label>
                            <textarea class="form-control" id="message2" name="message"
                                placeholder=" Je veux faire partie de l'aventure" rows="5" required></textarea>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="fichier2" class="form-label">Pièce jointe</label>
                            <input type="file" class="form-control" id="fichier2" name="fichier"></input>
                        </div>
                        <div class="container text-center">
                            <button type="reset" class="btn btn-danger">Effacer</button>
                            <button type="submit" class="btn btn-success">Envoyer</button>
                        </div>
                    </form>
                </div>

                <!-- Formulaire Poste 3 -->
                <div id=formulaire_poste_3 class="container border border-black border-5 rounded-5 p-1 bg-primary w-75">
                    <form class="position-relative" action="https://httpbin.org/post" method="post">
                        <a class="btn btn-close position-absolute top-0 end-0 mt-3 me-4 border border-white border-3"
                            href="#recrutement" role="button"></a>
                        <h2 class="text-center">Chargé(e) de terrain & référencement des lieux</h2>
                        <div class="mb-3">
                            <label for="nom3 text-start" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom3" name="nom" placeholder=" Votre nom">
                        </div>
                        <div class="mb-3 text-start">
                            <label for="mail3" class="form-label">Mail</label>
                            <input type="email" class="form-control" id="mail3" name="mail" placeholder=" Votre mail"
                                required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="message3" class="form-label">Message</label>
                            <textarea class="form-control" id="message3" name="message"
                                placeholder=" Je veux faire partie de l'aventure" rows="5" required></textarea>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="fichier2" class="form-label">Pièce jointe</label>
                            <input type="file" class="form-control" id="fichier2" name="fichier"></input>
                        </div>
                        <div class="container text-center">
                            <button type="reset" class="btn btn-danger">Effacer</button>
                            <button type="submit" class="btn btn-success">Envoyer</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php

include './Templates/footer.php';

?>