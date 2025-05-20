#1 PHP Syntax

    - le fichier PHP contient de l'HTML et un script PHP 
        <!DOCTYPE html>
        <html>
        <body>

        <h1>My first PHP page</h1>

        <?php echo "Hello World!"; ?>

        </body>
        </html>

    - PHP script commence par       <?php      et se termine par        ?>
    - Les commandes PHP se terminent par        ;
    -
    - les fontctions, classes, mot-clés ne sont pas sensibles à la casse
    - ! Les variables sont sensibles à la casse !
    - Pour commenter :      //  commentaire sur une ligne
                            #   commentaire sur une ligne
                            /*  commentaire sur
                                plusieurs lignes */
    - Assignation de variables :    $x = 15;
                                    $my_variable = "mot";
                                    $a = $b = $c = "coucou";    // toutes les variables valent "coucou"
    - Affichage de variable     $txt = "Campus"
                                echo "I love $txt !";       // Sortie : I Love Campus !
                                echo "I love ".$txt." !";   // Sortie : I Love Campus !
    - Les variables n'ont pas besoins d'être typées ni déclarées (exceptions depuis PHP 7 avec strict et non-strict)
    - var_dump($ma_variable) permet d'obtenir la valeur et le type de $ma_variable

    - différents usages de echo :       echo "<h2>PHP is Fun!</h2>";
                                        echo "Hello world!<br>";
                                        echo "I'm about to learn PHP!<br>";
                                        echo "This ", "string ", "was ", "made ", "with multiple parameters.";
    - pour insérer les variables selont guillemets utilisés :
                "voici ma variable $var voyez comme elle brille";
                'voici ma variable '.$var.' voyez comme elle brille';

    - types de variable
        - String    $txt = "coucou";        strlen()        str_word_count()        strpos()
        - Integer   $a = -5 ;               PHP_INT_MAX     PHP_INT_MIN             is_int()
        - Float     $b = 10.2;              PHP_FLOAT_MAX   PHP_FLOAT_MIN           is_float()
        - Boolean   $c = true;
        - Array     $eleves = array("Jacques","Jean","Pierre");
        - Objects   et classes
            Les classes sont des modèles d'objets
            Les objets sont des exemples de classe; des instances.

            class Car {
                public $color;
                public $model;
                public function __construct($color, $model) {
                    $this->color = $color;
                    $this->model = $model;
                    }
                public function message() {
                    return "My car is a " . $this->color . " " . $this->model . "!";
                    }
                }
        - NULL
        - Infinity              is_finite()       is_infinite()
        - NaN                   is_nan()
        - Numerical String      is_numeric()
        
        

    - while (condition) {
    commandes;
    }
    
    - do {
    commandes;
    } while (condition);
    
    - for ($x=0; $x<10; $x++) {
    commandes;
    }
    
    - foreach ($array as $item) {
    commandes;
    }
    
    - foreach ($array as $key => $item) {
    commandes;
    }
    
    - define function :
        arg1 = argument    
        arg2 = argument avec valeur par défaut
        arg3 = argument donné en référence (et pas juste une copie de la valeur).
        arg4 = nombre variable d'arguments. Les arguments seront stoskés dans un array $arg4[]
            ! attention, un seul argument de longeur variable, le dernier !
        - function name($arg1, $arg2 = default, &$arg3, ...$arg4) {
        commands;
        return $var;
        }
        
    - call function :
        name();
    
    
    + addition
    - soustraction
    * multiplication
    / division
    % modulo
    ** puissance
    = assigner valeur
    +=  -=  *=  /=  %=
    
    == égal
    === identique (valeur et type)
    != non égal
    <> non égal
    !== non identique
    <=> Spaceship       $x <=> $y indique si x est plus petit, égal ou plus grand que y. le retour vaudra respectivement -1, 0, ou 1
    
    and     &&      ET
    or      ||      OU
    xor             OU EXCLUSIF
    !               NON
    
    . concaténation
    .= concaténation et assignement variable de gauche
    
    - arrays
        + union
        == égalité (same key=>value)
        === identique (same key=>value in the sae order and of the same types)
        != inégalité
        !== non identique
        
    Assignement conditionnel
    ?:      $x = expr1 ? expr2:expr3     si expr1 alors expr2 sinon expr3
    ??      $x = expr1 ?? expr2         expr 1 si expr existe et non NULL sinon expr2
    
   
   
   Forms : POST ou GET renvoient données via array (key1 => value1, key2 => value2, ...) accessible via $_POST ou $_GET sans problème de scope
   GET : donnée dans l'URL donc visibles
   POST : préférable
   !! valider les données du formulaire avant de les utiliser !
   
// formulaire   
<html>
<body>

<form action="welcome.php" method="POST">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

</body>
</html>

// fichier welcome.php
<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>

</body>
</html>


pour la validation des données de formulaire
    passer toutes les variables à travers htmlspecialchars()
    supprimer les caractères inutiles avec trim()
    retirer les antislash avec stripslashes()
    
    ==> écriture d'une fonction qui execute ces étapes
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
    
    
on utilise ainsi :

$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
}

l'en-tête du formulaire :
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

$_SERVER["PHP_SELF"] est une variable super globale qui renvoie le nom du fichier depuis lequel on exécute le script



formulaires     champs requis

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
  }
  
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Name: <input type="text" name="name">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
E-mail:
<input type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Website:
<input type="text" name="website">
<span class="error"><?php echo $websiteErr;?></span>
<br><br>
Comment: <textarea name="comment" rows="5" cols="40"></textarea>
<br><br>
Gender:
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Other
<span class="error">* <?php echo $genderErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit">

</form>



formulaires     afficher valeurs dans les champs après submit

Name: <input type="text" name="name" value="<?php echo $name;?>">

E-mail: <input type="text" name="email" value="<?php echo $email;?>">

Website: <input type="text" name="website" value="<?php echo $website;?>">

Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>

Gender:
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="male") echo "checked";?>
value="male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="other") echo "checked";?>
value="other">Other

