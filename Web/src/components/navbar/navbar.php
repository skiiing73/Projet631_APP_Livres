<?php

// Function to get user profile_picture
function getUserPfP($conn, $user_id) {
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

        $user_id = intval($_SESSION['user_id']);

        // Call the function to get user information
        $user_info = getUserInfo($conn, $user_id);

        // If user information is successfully retrieved and has a profile picture
        if ($user_info && !empty($user_info['photo_de_profile'])) {
            $photo_de_profile = htmlspecialchars($user_info['photo_de_profile']);

            // Output the profile picture as a clickable link to the user's profile
            echo '<a href="./livres.php?pages=profile&user_id=' . $user_id . '" class="profile-picture">';
            echo '<img src="' . $photo_de_profile . '" alt="Profile Picture">';
            echo '</a>';
        }
    } else {
        // If no `user_id` is provided, display login and signup links
        echo '<div id="login_signin">';
        echo '<a href="./livres.php?pages=login" class="nav-link" id="login">Connexion</a>';
        echo '<a href="./livres.php?pages=register" class="nav-link" id="signin">Créer mon compte</a>';
        echo '</div>';
    }
    ?>
</div>
