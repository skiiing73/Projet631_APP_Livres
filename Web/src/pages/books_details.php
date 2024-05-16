<!DOCTYPE html>
<html lang="fr">

<?php
// Session 
$_SESSION['page'] = "books_details";
// Les fonctions importés : 
require_once("./src/requests/table_books_details.php");

$livre_actuel = selectLivreByIdLivre($conn, $_GET["id_livre"]);
$auteurs = selectAuteursByIdLivre($conn, $livre_actuel["id_livre"]);
$moyenne_note = selectAvisByIdLivre($conn, $livre_actuel["id_livre"]);
?>

<head>
    <meta charset="UTF-8">
    <?php  //css a ajouter apres 
    ?>
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/books_details.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>SuperLivres - <?php echo $livre_actuel["nom_livre"]; ?> </title>
</head>

<body>
    <?php
    require_once("./src/components/navbar/navbar.php");
    ?>
    <div class="container">
        <div class="container-titre">
            <span class="stars">★</span>
            <h1 class="titre"> <?php echo $livre_actuel["nom_livre"]; ?> </h1>
            <span class="stars">★</span>
        </div>

        <div class="details_informations">
            <h2>Informations détaillées : </h2>
            <?php
            echo "<p> Auteurs : ";
            foreach ($auteurs as $auteur) {
                echo $auteur . ", ";
            }
            echo "</p>";
            echo "<p> Genre : " . $livre_actuel['genre'] . " </p> <p>Date de publication : " . $livre_actuel["date_de_publication"] . " </p>";
            echo "<p> Note : ";

            if (selectAvisByIdLivre($conn, $livre_actuel["id_livre"])) {
                $moyenneNote = floatval(selectAvisByIdLivre($conn, $livre_actuel["id_livre"]));
                echo $moyenneNote . " | ";
                while ($moyenneNote >= 0.5) {
                    if ($moyenneNote >= 1) {
                        echo " <span class= 'stars' ><i class='fa-solid fa-star'></i></span> ";
                        $moyenneNote = $moyenneNote - 1;
                    } else if ($moyenneNote >= 0.5) {
                        echo "<span class= 'stars'> <i class='fa-solid fa-star-half-stroke'></i></span> ";
                        $moyenneNote = $moyenneNote - 1;
                    } else {
                        $moyenneNote = $moyenneNote - 1;
                    }
                }
            } else {
            }
            echo "</p>";
            echo "</div>";
            ?>

        </div>
    </div>
    <?php



    require_once("./src/components/footer/footer.php");
    ?>

</body>
<script src="https://kit.fontawesome.com/008612b1fd.js" crossorigin="anonymous"></script>