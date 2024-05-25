<!DOCTYPE html>
<html lang="fr">

<?php
// Les fonctions importés : 
$chemin = "./src/requests/table_welcome.php";
require_once($chemin);
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
        <?php
        // Vérifier si l'utilisateur est déjà connecté, si oui le rediriger vers la page d'accueil
        if (isset($_SESSION['user_id'])) {
            // Récupérer le prénom de l'utilisateur depuis la session
            $first_name = getUserFirstName($conn, $user_id);
            // Afficher le message de bienvenue
            echo "<p>Bonjour $first_name, bienvenue sur SuperLivres !</p>";
        }
        exit();
        ?>
    </div>

    <?php
    require_once("./src/components/footer/footer.php");
    ?>

</body>



</html>
