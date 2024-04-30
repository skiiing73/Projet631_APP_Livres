<!DOCTYPE html>
<html lang="en">

<?php
// Session 
$_SESSION['page'] = 1;
// Les fonctions importés : 
require_once("./src/requests/table_welcome.php");
?>

<head>
    <meta charset="UTF-8">
    <?php  //css a ajouter apres 
    ?>
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/welcome.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <title>Distributeur des livres ?</title>
</head>

<body>
    <?php
    require_once("./src/components/navbar/navbar.php");
    echo "<h5> Coucou </h5>";
    var_dump($conn); // Connection SQL $conn à utiliser pour des fonctions


    ?>

</body>