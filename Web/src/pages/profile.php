<?php
// Les fonctions importées : 
require_once("./src/requests/table_profile.php");

// Récupérer les informations de l'utilisateur
if (isset($_SESSION["id_user"]) && $_SESSION["id_user"] != "") {
    $user_id = $_SESSION["id_user"];

    // Obtenir les informations de l'utilisateur
    $user_info = getUserInfo($conn, $user_id);

    // Récupérer les avis de l'utilisateur
    $reviews = getUserReviews($conn, $user_id);

    // Si les informations de l'utilisateur sont récupérées avec succès
    if ($user_info) {
        $prenom_utilisateur = htmlspecialchars($user_info['prenom_utilisateur']);
        $nom_utilisateur = htmlspecialchars($user_info['nom_utilisateur']);
        $photo_de_profil_path = "/pictures/$user_id/profile_picture.png";
    } else {
        // Rediriger vers une page d'erreur si l'utilisateur n'est pas trouvé
        header("Location: error.php");
        exit();
    }
} else {
    // Rediriger vers une page d'erreur si l'ID de l'utilisateur n'est pas fourni
    header("Location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/profile.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <?php echo "<title>Profile utilisateur de " . $prenom_utilisateur . " " . $nom_utilisateur . "</title>"; ?>
</head>
<body>
    <?php require_once("./src/components/navbar/navbar.php"); ?>
    <div class="user-info">
        <h2><?php echo $prenom_utilisateur . " " . $nom_utilisateur; ?></h2>
    </div>
    </div>
    <div class="reviews-container">
        <h2>Mes Avis</h2>
        <?php if ($reviews && count($reviews) > 0) : ?>
            <ul>
                <?php foreach ($reviews as $review) : ?>
                    <li>
                        <p><strong>Livre:<?php echo htmlspecialchars($review['nom_livre']); ?></strong></p>
                        <p><strong>Note:</strong> <?php echo htmlspecialchars($review['note']); ?></p>
                        <p><strong>Commentaire:</strong> <?php echo htmlspecialchars($review['commentaire']); ?></p>
                        <p><strong>Date:</strong> <?php echo htmlspecialchars($review['date_avis']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>Vous n'avez écrit aucun avis.</p>
        <?php endif; ?>
    </div>
    <?php require_once("./src/components/footer/footer.php"); ?>
</body>
</html>
