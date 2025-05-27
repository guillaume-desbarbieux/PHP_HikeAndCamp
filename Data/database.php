<?php


function sendQueryToDatabase(string $query): array
{
    try {
        $mysqlClient = new PDO(
            'mysql:host=localhost;dbname=hikeandcamp;charset=utf8',
            'test',
            'a',

            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $answer = $mysqlClient->prepare($query);
    $answer->execute();
    
    return $answer->fetchAll();
}



$product = sendQueryToDatabase('SELECT url_image, name FROM products');


foreach($product as $item){
  
   ?> 
    <img src=<?= $item["url_image"] ?>>
    <p><?= $item["name"] ?> <br> </p>
    <?php
}

?>
