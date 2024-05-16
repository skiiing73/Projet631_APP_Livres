<?php
require_once("./lib/database.php");


// Exemple
/**
 *
 *
 *
 * function addActionneur($conn, $nom, $type, $description)
 * {
 * //Execution sql
 * $res = mysqli_prepare($conn, "insert into actionneur (`nom`, `type_actionneur`,`description`,`etat`) VALUES (?,?,?,'OFF')");
 * mysqli_stmt_bind_param($res, "sss", $nom, $type, $description);
 * return mysqli_stmt_execute($res);
 * }
 *
 */

function selectLivreByIdLivre($conn, $id_livre)
{
    $res = mysqli_prepare($conn, "SELECT id_livre, nom_livre, date_de_publication, genre, id_editeur FROM livre WHERE id_livre = ?");
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
        "date_de_publication" => $date_de_publication,
        "genre" => $genre,
        "id_editeur" => $id_editeur
    ];

    // Retourner les détails du livre
    return $livre;
}

function selectAvisByIdLivre($conn, $id_livre)
{
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


function selectAuteursByIdLivre($conn, $id_livre)
{
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
