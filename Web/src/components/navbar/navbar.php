<?php

// Function to get user profile_picture
function getUserInfo($conn, $user_id) {
    $sql = "SELECT photo_de_profil FROM utilisateur WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

?>

<!-- HTML Part -->

<div class="nav">
    <div id="nav_container">
        <div class="logo">
            <span class="stars">★</span>
            <span class="name">SuperLivres</span>
            <span class="stars">★</span>
        </div>

        <div class="links">
            <a href="./livres.php?pages=welcome" class="nav-link">Accueil</a>
            <a href="./livres.php?pages=books" class="nav-link">Nos livres</a>
            <a href="./livres.php?pages=welcome" class="nav-link">Contact</a>
        </div>

        <?php
            // Check if a `user_id` is passed in the URL
            if (isset($_SESSION['user_id'])) {

                echo '<div id="profile">';
                echo '<a href="./livres.php?pages=profile" class="nav-link">Mon compte</a>';
                echo '</div>';

            } else {
                // If no `user_id` is provided, display login and signup links
                echo '<div id="login_signin">';
                echo '<a href="./livres.php?pages=login" class="nav-link" id="login">Connexion</a>';
                echo '<a href="./livres.php?pages=register" class="nav-link" id="signin">Créer mon compte</a>';
                echo '</div>';
            }
        ?>
    </div>
</div>
