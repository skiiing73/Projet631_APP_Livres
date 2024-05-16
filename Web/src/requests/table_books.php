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

function selectAllLivre($conn)
{
    $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY date_de_publication ASC";
    return  mysqli_query($conn, $sql);
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
