<?php
$pageInfo = [
    "title" => "Page d'Accueil de Hike & Camp",
    "meta_description" => "Vous êtes au bon endroit :)",
];

require_once './Templates/header.php';
?>



<section id="blocDescription">
    <div class="card text-white container-sm bg-transparent border-0 p-3">
        <img src="Images/image_accueil_bivouac.png" class="card-img rounded-5" alt="Image">
        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-start w-100 text-wrap">
            <h1 class="card-title ps-3 display-7 display-md-3 display-lg-2">Les leaders mondiaux de la recherche de
                bivouac</h1>
            <h2 class="card-title ps-3 display-7 display-md-3 display-lg-2">Notre appli vous permet de trouver un
                spot idéal pour votre sortie</h2>
        </div>
    </div>
</section>
<div class="container mt-3">
    <h3>Notre histoire:</h3>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-8">
            <p>À travers les sentiers escarpés et les forêts de pins argentés, les randonneurs
                gravissent les hauteurs, bercés par le murmure des ruisseaux glaciaires. Le vent caresse les crêtes
                enneigées tandis que le soleil décline derrière les sommets, peignant le ciel de teintes dorées et
                pourpres.
                Entre les rochers moussus et les prairies alpines, un coin de nature sauvage s’offre aux voyageurs
                en
                quête
                de repos. Là, sous la voûte céleste infinie, le bivouac se dresse, modeste abri face à l’immensité
                des
                montagnes.
                Autour du feu crépitant, les ombres dansent sur les toiles des tentes tandis que la nuit enveloppe
                le
                campement d’un silence apaisant. L’air vif transporte les senteurs de résine et d’herbes sauvages,
                éveillant
                un profond sentiment de liberté. Peu à peu, le sommeil gagne les esprits fatigués, bercés par le
                souffle
                du
                vent et le chant lointain d’une chouette solitaire. À l’aube, les premières lueurs effleurent les
                sommets,
                rappelant aux aventuriers que le chemin continue, toujours plus haut, toujours plus loin.
            </p>
        </div>
    </div>
</div>
<div class="container mt-3">
    <h3>Notre appli:</h3>
</div>
<div class="container">
    <div class="row justify-content-evenly">
        <div class="col-xl-2 p-3">
            <img class="img-fluid rounded-5" alt="imagedelappli" src="Images/appli_telephone.png">
        </div>
        <div class="col-xl-2 p-3">
            <img class="img-fluid rounded-5" alt="imagedelappli" src="Images/appli_telephone.png">
        </div>
    </div>
</div>
<!-- SERVICE        -->
<!-- Produit 1-->
<div class="container mt-3">
    <h3>Nos services:</h3>
</div>
<div class="container mt-3">
    <div class="row g-4 d-flex flex-column flex-md-row">
        <div class="col-md-6">
            <a href="?page=charlesdegaulle">
                <img class="w-100 border border-warning border-3 rounded-5" src="./Images/lieux/porteavion.jpg"
                    alt="porteavions">
            </a>
        </div>
        <div class="col-md-6 g-3 text-center">
            <h3>Le Porte-avions charles de Gaulle</h3>
            <h4 class="text-center">⭐⭐⭐⭐⭐⭐⭐</h4>
            <h6>Notre produit phare, une nuit en bivouac sur un porte-avions, vous en avez rêvé ? Nous l'avons
                fait,
                venez profiter d'une nuit exceptionnelle avec un ciel étoilé au cœur de l'océan.
            </h6>
        </div>
    </div>
</div>
<!-- Produit 2-->
<div class="container mt-3">
    <div class="row g-4 d-flex flex-column flex-md-row-reverse">
        <div class="col-md-6">
            <a href="?page=servieres">
                <div class="ratio ratio-4x3">
                    <img class="object-fit-cover w-100 border border-warning border-3 rounded-5"
                        src="./Images/lieux/servieres.jpg" alt="porteavions">
                </div>
            </a>
        </div>
        <div class="col-md-6 text-center">
            <h3>Le Lac de Servières</h3>
            <h4 class="text-center">⭐⭐⭐⭐</h4>
            <h6>Venez vous reposer au lac de Servières ou la fraicheur et la beauté du lieu vous feront oublier la
                fatigue en fin de journéee
            </h6>
        </div>
    </div>
</div>
<!-- Produit 3-->
<div class="container mt-3">
    <div class="row g-4 d-flex flex-column flex-md-row">
        <div class="col-md-6">
            <a href="?page=roybon">

                <img class="w-100 border border-warning border-3 rounded-5" src="./Images/lieux/roybon.jpeg"
                    alt="porteavions">
            </a>
        </div>
        <div class="col-md-6 text-center">
            <h3>La cabane de Roybon</h3>
            <h4 class="text-center">⭐⭐⭐⭐⭐</h4>
            <h6>Après une belle randonnée, venez vous reposer dans cette belle cabane confortable la vue y est
                magnifique et l'air y est pur
            </h6>
        </div>
    </div>
</div>

<?php

require_once './Templates/footer.php';

?>