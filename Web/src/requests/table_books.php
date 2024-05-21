<?php
require_once("./lib/database.php");

function selectAllLivre($conn) {
    $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY date_de_publication ASC";
    return  mysqli_query($conn, $sql);
}

function selectAverageRateReview($conn, $id_livre) {
    $res = mysqli_prepare($conn, "SELECT SUM(note) / COUNT(note) AS moyenne_note FROM avis WHERE id_livre = ?");
    mysqli_stmt_bind_param($res, "i", $id_livre);
    mysqli_stmt_execute($res);

    // Lier le résultat à des variables PHP
    mysqli_stmt_bind_result($res, $moyenne_note);

    // Récupérer le résultat
    mysqli_stmt_fetch($res);

    // Retourner la moyenne des notes
    return $moyenne_note;
}

function selectAllLivreOrder($conn, $order) {
    if ($order == 0) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY nom_livre ASC";
    } else if ($order == 1) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY nom_livre DESC";
    } else if ($order == 2) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY genre ASC";
    } else if ($order == 3) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY genre DESC";
    } else if ($order == 4) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY date_de_publication ASC";
    } else if ($order == 5) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY date_de_publication DESC";
    } else {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY date_de_publication ASC";
    }
    return  mysqli_query($conn, $sql);
}

function selectAuteursByIdLivre($conn, $id_livre) {
    $res = mysqli_prepare($conn, "SELECT nom_auteur, prenom_auteur FROM auteur JOIN ecrit AS e ON e.id_auteur = auteur.id_auteur WHERE id_livre = ?");
    mysqli_stmt_bind_param($res, "i", $id_livre);
    mysqli_stmt_execute($res);

    // Créer un tableau pour stocker les noms des auteurs
    $auteurs = [];

    // Lier le résultat à des variables PHP
    mysqli_stmt_bind_result($res, $nom_auteur, $prenom_auteur);

    // Récupérer le résultat
    while (mysqli_stmt_fetch($res)) {
        // Ajouter le nom complet de l'auteur au tableau
        $auteurs[] = $prenom_auteur . " " . $nom_auteur;
    }

    // Retourner les noms des auteurs
    return $auteurs;
}
