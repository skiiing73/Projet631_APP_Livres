<?php
require_once("./lib/database.php");

// Function to get user information
function getUserInfo($conn, $user_id) {
    $sql = "SELECT prenom_utilisateur, nom_utilisateur, photo_de_profil FROM utilisateur WHERE id_utilisateur = ?;";
    $stmt = $conn->prepare($sql);

    // Bind the user ID parameter
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user was found
    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

// Function to get all reviews written by a user
function getUserReviews($conn, $user_id) {
    $sql = "SELECT id_avis, note, commentaire, date_avis, id_livre FROM avis WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($sql);

    // Bind the user ID parameter
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch all reviews and return them as an associative array
    if ($result) {
        $reviews = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $reviews;
    } else {
        error_log("Execute failed: " . $stmt->error);
        return false;
    }
}

// Function to get book information by its ID
function getBookByID($conn, $book_id) {
    $sql = "SELECT nom_livre, date_de_publication, genre, id_auteur, nom_auteur, prenom_auteur, nom_editeur 
            FROM livre 
            NATURAL JOIN ecrit 
            NATURAL JOIN auteur 
            NATURAL JOIN editeur 
            WHERE id_livre = ?";
    $stmt = $conn->prepare($sql);

    // Bind the book ID parameter
    $stmt->bind_param("i", $book_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the book information and return it as an associative array
    if ($result) {
        $book_info = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $book_info;
    } else {
        error_log("Execute failed: " . $stmt->error);
        return false;
    }
}
?>
