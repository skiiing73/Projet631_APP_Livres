<!DOCTYPE html>
<html lang="fr">

<?php
// Session 
$_SESSION['page'] = "welcome";
// Les fonctions importés : 
$chemin = "./src/requests/table_welcome.php";
echo $chemin;
require_once($chemin);
?>

<head>
    <meta charset="UTF-8">
    <?php  //css a ajouter apres 
    ?>
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/welcome.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>Distributeur des livres</title>
</head>

<body>
    <?php
    require_once("./src/components/navbar/navbar.php");
    ?>
    <div class="livre_fond">
    </div>
    <div class="progress_bar"></div>

    <div class="slider">
        <img id="img-1" src="./pictures/polytech.jpeg" alt="Image 1" />
        <img id="img-2" src="./pictures/bd.jpg" alt="Image 2" />
        <img id="img-3" src="./pictures/livre2.jpg" alt="Image 3" />
        <img id="img-4" src="./pictures/manga3.jpg" alt="Image 4" />
        <img id="img-5" src="./pictures/manga2.jpg" alt="Image 5" />
    </div>
    <div class="navigation-button">
        <span class="dot active" onclick="changeSlide(0)"></span>
        <span class="dot" onclick="changeSlide(1)"></span>
        <span class="dot" onclick="changeSlide(2)"></span>
        <span class="dot" onclick="changeSlide(3)"></span>
        <span class="dot" onclick="changeSlide(4)"></span>
    </div>

    <?php
    require_once("./src/components/footer/footer.php");
    ?>

</body>

<script src="./src/scripts/welcome.js"></script>