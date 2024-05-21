<?php
    // Les fonctions importés : 
    require_once("./src/requests/table_profile.php");
?>

<?php
// Check if a `user_id` is passed in the URL
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);

    // Call the function to get user information
    $user_info = getUserInfo($conn, $user_id);

    // Fetch user reviews
    $reviews = getUserReviews($conn, $user_id);

    // If user information is successfully retrieved
    if ($user_info) {
        $prenom_utilisateur = htmlspecialchars($user_info['prenom_utilisateur']);
        $nom_utilisateur = htmlspecialchars($user_info['nom_utilisateur']);
        $photo_de_profil = htmlspecialchars($user_info['photo_de_profil']);
    } else {
        // Redirect to an error page if the user is not found
        header("Location: error.php");
        exit();
    }
} else {
    // Redirect to an error page if `user_id` is not provided
    header("Location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
        require_once("./src/components/navbar/navbar.php");
    ?>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/profile.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <?php echo "<title>Profile utilisateur de " . $prenom_utilisateur . " " . $nom_utilisateur . "</title>"; ?>
    <link rel="icon" type="image/x-icon" href="../../pictures/favicon.ico">
</head>

<body>
    <div class="user-profile-container">
        <div class="profile-picture">
            <img src="<?php echo $profile_picture; ?>" alt="Profile Picture">
        </div>
        <div class="user-info">
            <h2><?php echo $prenom_utilisateur . " " . $nom_utilisateur; ?></h2>
        </div>
    </div>

    <div class="reviews-container">
        <h2>Mes Avis</h2>
        <?php if ($reviews && count($reviews) > 0): ?>
            <ul>
                <?php foreach ($reviews as $review): ?>
                    <li class="review">
                        <div class="book-info">

                            <!-- Fetch of all the book info for this review's book id -->
                            <?php
                                $book_info = getBookByID($conn, $review['id_livre']);
                            ?>

                            <!-- Display of the book's informations -->
                            <h3><?php echo htmlspecialchars($book_info[0]['nom_livre']); ?></h3>
                            <?php 
                                echo "<a href=\"./livres.php?pages=welcome&auteur_id=" . $book_info[0]['id_auteur'] . "\">" . htmlspecialchars($book_info[0]['prenom_auteur'] . " " . $book_info[0]['nom_auteur']) . "</a>";
                            ?>
                            <p><?php echo  htmlspecialchars($book_info[0]['nom_editeur']); ?></p>
                            <p><?php echo $book_info[0]['date_de_publication']; ?></p>
                            
                        </div>
                        <div class="review-info"> 
                            <p><strong>Note:</strong> <?php echo htmlspecialchars($review['note']); ?></p>
                            <p><strong>Commentaire:</strong> <?php echo htmlspecialchars($review['commentaire']); ?></p>
                            <p><strong>Date:</strong> <?php echo htmlspecialchars($review['date_avis']); ?></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Vous n'avez écrit aucun avis.</p>
        <?php endif; ?>
    </div>

</body>

<?php
    require_once("./src/components/footer/footer.php");
?>
</html>



