<?php
$pageInfo = [
    "title" => "Page Contact",
    "meta_description" => "Je vous écoute",
];
require_once './Templates/header.php';
?>

<div class="container border border-black border-5 rounded-5 p-1 bg-primary w-75 mt-5">
    <form method="post" enctype="multipart/form-data">
        <h2 class="text-center">Contact</h2>
        <h2 class="text-danger text-center font-weight-bold"><?= $_SESSION["error"]["contactForm"]["validation"] ?? "" ?></h2>
        <h2 class="text-success text-center font-weight-bold"><?= $_SESSION["validation"]["contactForm"] ?? "" ?></h2>
        <?php $_SESSION["validation"]["contactForm"] = NULL; ?>

        <div class="mb-3 text-start">
            <label for="nom" class="form-label">Nom*</label>
            <span class="text-danger font-weight-bold"><?= $_SESSION["error"]["contactForm"]["nom"] ?? "" ?></span>
            <input type="text" class="form-control" id="nom" name="nom" placeholder=" Votre nom" value=<?= $_SESSION["contactForm"]["nom"] ?? "" ?>>
        </div>
        <div class="mb-3 text-start">
            <label for="mail" class="form-label">Mail</label>
            <span class="text-danger font-weight-bold"><?= $_SESSION["error"]["contactForm"]["mail"] ?? "" ?></span>
            <input type="text" class="form-control" id="mail" name="mail" placeholder=" Votre mail" value=<?= $_SESSION["contactForm"]["mail"] ?? "" ?>>
        </div>
        <div class="mb-3 text-start">
            <label for="message" class="form-label">Message</label>
            <span class="text-danger font-weight-bold"><?= $_SESSION["error"]["contactForm"]["message"] ?? "" ?></span>
            <textarea class="form-control" id="message" name="message"
                placeholder="Décrivez votre problème" rows="5"><?= $_SESSION["contactForm"]["message"] ?? "" ?></textarea>
        </div>
        <div class="mb-3 text-start">
            <label for="fichier1" class="form-label">Capture d'écran de votre problème</label>
             <div class="text-danger font-weight-bold"><?= $_SESSION["error"]["contactForm"]["fichier"]["type"] ?? "" ?></div>
             <div class="text-danger font-weight-bold"><?= $_SESSION["error"]["contactForm"]["fichier"]["size"] ?? "" ?></div>
             <div class="text-danger font-weight-bold"><?= $_SESSION["error"]["contactForm"]["fichier"]["extension"] ?? "" ?></div>
             
            <input type="file" class="form-control" id="fichier1" name="fichier"><?= $_SESSION["contactForm"]["fichier"] ?? "" ?></input>
        </div>
        <div class="container text-center">
            <input type="submit" class="btn btn-success" name="submitContactForm" value="Envoyer">
            <input type="submit" class="btn btn-danger" name="resetContactForm" value="Effacer">

        </div>
    </form>
</div>

<?php
require_once './Templates/footer.php';
?>