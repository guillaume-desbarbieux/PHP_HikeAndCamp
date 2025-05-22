<?php
$pageInfo = [
    "title" => "Erreur 404",
    "meta_description" => "Vous vous êtes perdus ?",
];
require_once './Templates/header.php';
?>

<div class="container border border-black border-5 rounded-5 p-1 bg-primary w-75 mt-5">
   <h1 class="text-center">Cette page ne semble pas exister !</h1>
</div>

<?php
require_once './Templates/footer.php';
?>