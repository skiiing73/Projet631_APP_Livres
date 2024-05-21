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

// Function to get a book infos from its id
function getBookByID($conn, $id_livre) {
    $res = mysqli_prepare($conn, "SELECT nom_livre, date_de_publication, genre, id_editeur FROM livre WHERE id_livre = ?");
    mysqli_stmt_bind_param($res, "i", $id_livre);
    mysqli_stmt_execute($res);

    // Lier le résultat à des variables PHP
    mysqli_stmt_bind_result($res, $id_livre, $nom_livre, $date_de_publication, $genre, $id_editeur);

    // Récupérer le résultat
    mysqli_stmt_fetch($res);

    // Créer un tableau associatif avec les détails du livre
    $livre = [
        "id_livre" => $id_livre,
        "nom_livre" => $nom_livre,
        "date_de_publication" => DateTime::createFromFormat('Y-m-d', $date_de_publication)->format('d/m/Y'),
        "genre" => $genre,
        "id_editeur" => $id_editeur
    ];

    // Retourner les détails du livre
    return $livre;
}

?>