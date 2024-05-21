<?php
require_once("./lib/database.php");

// Function to get user information
function getUserInfo($conn, $user_id) {
    $sql = "SELECT prenom_utilisateur, nom_utilisateur FROM utilisateur WHERE id_utilisateur = 1;";
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

// Function to get all reviews written by a user
function getUserReviews($conn, $user_id) {
    $sql = "SELECT id_avis, note, commentaire, date_avis, id_livre FROM avis WHERE id_utilisateur = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $user_id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $reviews = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $reviews;
        } else {
            error_log("Execute failed: " . $stmt->error);
        }
    } else {
        error_log("Failed to prepare statement: " . $conn->error);
    }
    return false;
}

?>