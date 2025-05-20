<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <?php
        echo    "
            <meta name='description' content=$page[meta_description]>
            <title>$page[title]</title>
            ";
    ?>

    <link rel="icon" type="image/x-icon" href="./Images/Logo.png">


    <!-- Intégration bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <!-- Importation Police de caractères -->

    <!-- Ligne de commande pour responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
    <!-- Intégrer ici le header -->

    <ul class="nav justify-content-around navheader bg-primary sticky-top align-items-center">
        <li class="nav-item">
            <a href="index.html"><img src="Images/Logo.png" class="img-fluid logo" alt="logo"></a>
        </li>
        <li class="nav-item">
            <h1 class="marque">Hike & Camp</h1>
        </li>
        <li class="nav-item d-flex flex-row">
            <a class="nav-link fs-3 text-dark" href="./equipe.html">Equipe</a>
            <a class="nav-link fs-3 text-dark" href="./contact.html">Contact</a>
            <a class="nav-link fs-3 text-dark" href="./catalogue.php">Catalogue</a>

        </li>

    </ul>