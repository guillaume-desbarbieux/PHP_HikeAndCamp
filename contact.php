<?php
$pageInfo = [
    "title" => "Page Contact",
    "meta_description" => "Je vous écoute",
];
require_once './Templates/header.php';
?>

<div class="container border border-black border-5 rounded-5 p-1 bg-primary w-75 mt-5">
    <form method="post">
        <h2 class="text-center">Contact</h2>
        <div class="mb-3 text-start">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder=" Votre nom">
        </div>
        <div class="mb-3 text-start">
            <label for="mail" class="form-label">Mail</label>
            <input type="Email" class="form-control" id="mail" name="mail" placeholder=" Votre mail">
        </div>
        <div class="mb-3 text-start">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message"
                placeholder="Décrivez votre problème" rows="5"></textarea>
        </div>
        <div class="mb-3 text-start">
            <label for="fichier1" class="form-label">Capture d'écran de votre problème</label>
            <input type="file" class="form-control" id="fichier1" name="fichier"></input>
        </div>
        <div class="container text-center">
            <button type="reset" class="btn btn-danger">Effacer</button>
            <button type="submit" class="btn btn-success">Envoyer</button>
        </div>
    </form>
</div>

<?php
require_once './Templates/footer.php';
?>