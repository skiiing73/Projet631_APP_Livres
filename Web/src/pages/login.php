<!DOCTYPE html>
<html lang="fr">

<?php
// Session 
$_SESSION['page'] = "login";
// Les fonctions importés : 
require_once("./src/requests/table_login.php");
?>

<head>
    <meta charset="UTF-8">
    <?php

    ?>
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/welcome.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>Page de connexion</title>
</head>

<body>
    <?php
    require_once("./src/components/navbar/navbar.php");
    var_dump($conn);

    



    require_once("./src/components/footer/footer.php");
    ?>

</body>