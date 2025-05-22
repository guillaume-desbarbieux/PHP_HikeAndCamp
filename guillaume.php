<?php
$pageInfo = [
    "title" => "CV de Guillaume Desbarbieux",
    "meta_description" => "Ne laissez pas traîner vos M&M's...",
];

include './Templates/header.php';
?>
<main>
    <div class="container-fluid">
        <!-- Bloc description et photo -->
        <div id="blocDescription" class="row justify-content-center">
            <div class="col-xl-6">
                <h2 class="fs-1">DESBARBIEUX</h2>
                <h2 class="fs-1">Guillaume</h2>
                <h2 class="fs-1">34 ans</h2>
                <p class="fs-5"><em>Passionné par l'aventure en pleine nature et les longues nuits sous les étoiles, je ne me sépare jamais de mon sac de couchage ultraléger et de mon ordinateur portable.

                        Que ce soit autour d'un feu de camp ou sous une tente improvisée, je jongle entre lignes de code et contemplation des paysages sauvages.

                        Mon idéal ? Un bivouac en montagne avec une connexion solaire pour coder en toute liberté, bercé par le chant des oiseaux.</em>
                </p>
            </div>
            <div class="col-xl-3 col-sm-4">
                <img class="img-fluid border border-dark border-3 rounded-5" src="Images/photo_guillaume.png"
                    alt="Photo de Guillaume" title="Photo de Guillaume">
            </div>
        </div>
        <!-- Bloc Experiences -->
        <div class="row justify-content-center mt-5">
            <div class="col-10">
                <h3 class="fs-1">Expériences:</h3>
            </div>

            <div class="col-xl-10">
                <table class="table table-warning table-striped fs-6 border border-dark border-3 rounded-5">
                    <caption>

                    </caption>
                    <thead>
                        <tr>
                            <th scope="col">Dates</th>
                            <th scope="col">Entreprises / Ecoles</th>
                            <th scope="col">Descriptions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">03 / 2025</th>
                            <td>Campus Numerique, VALENCE</td>
                            <td>Formation développeur Web</td>
                        </tr>
                        <tr>
                            <th scope="row">01 / 2020 <BR> 07 / 2025</th>
                            <td>Armee de Terre</td>
                            <td>Combattant d'artillerie</td>
                        </tr>
                        <tr>
                            <th scope="row">11 / 2017 <BR> 10 / 2019</th>
                            <td>ESA, GLUN</td>
                            <td>Installation et dépannage d'alarme et vidéo surveillance</td>
                        </tr>
                        <tr>
                            <th scope="row">2017</th>
                            <td>Bac Pro SEN, ST Louis CREST</td>
                            <td>Syteme Electronique et Numerique</td>
                        </tr>
                        <tr>
                            <th scope="row">11 / 2016 <BR> 01 / 2017</th>
                            <td>Connexion, ETOILE SUR RHONE</td>
                            <td>Dépannage et installation d'électromenager</td>
                        </tr>
                        <tr>
                            <th scope="row">02 / 2016 <BR> 03 / 2016</th>
                            <td>Centre Hospitalier, CREST</td>
                            <td>Dépannage serveurs et equipements informatique</td>
                        </tr>
                        <tr>
                            <th scope="row">06 / 2015 <BR> 07 / 2015</th>
                            <td>Crest Informatique Services, CREST</td>
                            <td>Maintenance et reparation d'ordinateur</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="row" colspan="3">Mes experiences de 2015 à aujourd'hui.</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="row justify-content-around">
            <!-- Bloc Compétences -->
            <div class="col-xl-3 col-sm-10 mt-3 bg-warning-subtle border border-dark border-3 rounded-5">
                <div class="row justify-content-center">
                    <h3 class="fs-1 col-6">Compétences</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-5">
                        <h4 class="row">Notion</h4>
                        <h4 class="row">HTML</h4>
                        <h4 class="row">CSS</h4>
                        <h4 class="row">JAVAScript</h4>
                        <h4 class="row">Git / GitHub</h4>
                        <h4 class="row">VSCode</h4>
                    </div>
                    <div class="col-xl-5 col-5">
                        <h4 class="row">⚫ ⚫ ⚫ ⚪ ⚪</h4>
                        <h4 class="row">⚫ ⚫ ⚫ ⚪ ⚪</h4>
                        <h4 class="row">⚫ ⚫ ⚫ ⚫ ⚪</h4>
                        <h4 class="row">⚫ ⚫ ⚪ ⚪ ⚪</h4>
                        <h4 class="row">⚫ ⚫ ⚪ ⚪ ⚪</h4>
                        <h4 class="row">⚫ ⚫ ⚫ ⚪ ⚪</h4>
                    </div>
                </div>

            </div>
            <!-- Bloc Hobbies -->
            <div class="col-xl-3 col-sm-10 mt-3 bg-warning-subtle border border-dark border-3 rounded-5">
                <div class="row justify-content-center">
                    <h3 class="fs-1 col-6">Hobbies</h3>
                </div>
                <div class="row justify-content-center">
                    <div class="col-10">
                        <h4 class="row">Courses a pied 👟</h4>
                        <h4 class="row">Escalade 🧗🏻</h4>
                        <h4 class="row">Ski ⛷️</h4>
                        <h4 class="row">Youtube ▶️</h4>
                    </div>

                </div>
            </div>

        </div>
    </div>

</main>
<?php

include './Templates/footer.php';

?>