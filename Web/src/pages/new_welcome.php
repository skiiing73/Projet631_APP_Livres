<!DOCTYPE html>
<html lang="fr">

<?php
require_once("./src/requests/table_welcome.php");
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/new_welcome.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>SuperLivres - Accueil </title>
</head>

<body>
    <?php
    require_once("./src/components/navbar/navbar.php");
    ?>

    <div class="welcome_page">
    </div>

</body>

<?php
    require_once("./src/components/footer/footer.php");
?>

</html>
