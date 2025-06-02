<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajouter un produit</title>
</head>

<body>
    <h1>Ajouter un nouveau produit</h1>
    <form method="post">
        <label for="nom">Nom du produit :</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="description">Description :</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="prix">Prix (€) :</label><br>
        <input type="number" id="prix" name="prix" step="0.01" required><br><br>

        <label for="image">URL de l'image :</label><br>
        <input type="url" id="image" name="image" ><br><br>
        <label for="poids">Poids (g) :</label><br>
        <input type="number" id="poids" name="poids" required><br><br>
        <label for="stock">Stock :</label><br>
        <input type="number" id="stock" name="stock" required><br><br>
        <label for="categorie">Catégorie :</label><br>
        <select id="categorie" name="categorie" required>
            <option value="1">Catégorie 1</option>
            <option value="2">Catégorie 2</option>
            <option value="3">Catégorie 3</option>
        </select><br><br>
        <label for="disponible">Disponible :</label><br>
        <input type="checkbox" id="disponible" name="disponible" value="1" checked><br><br>
        
        <input type="submit" class="btn btn-success m-auto" name="submitProduct" value="Ajouter un produit">
    </form>
</body>

</html>