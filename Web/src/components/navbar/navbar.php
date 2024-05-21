<?php
    // Les fonctions importés : 
    require_once("./src/requests/table_profile.php");
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



                $user_id = intval($_SESSION['user_id']);

                // Call the function to get user information
                $user_info = getUserInfo($conn, $user_id);

                $photo_de_profil = htmlspecialchars($user_info['photo_de_profil']);

                if ($photo_de_profil == NULL) {
                    $photo_de_profil = "pictures/blank-profile.png";
                }

                // Output the profile picture as a clickable link to the user's profile
                echo '<a href="./livres.php?pages=profile&user_id=' . $user_id . '" class="profile-picture">';
                echo '<img src="' . $photo_de_profil . '" alt="Profile Picture" id="profil">';
                echo '</a>';

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
