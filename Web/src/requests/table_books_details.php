<?php
require_once("./lib/database.php");

function selectLivreByIdLivre($conn, $id_livre) {
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
        "date_de_publication" => DateTime::createFromFormat('Y-m-d', $date_de_publication)->format('d/m/Y'),
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

function selectEditeurByIdEditeur($conn, $id_editeur)
{
    $res = mysqli_prepare($conn, "SELECT nom_editeur FROM Editeur WHERE id_editeur = ?");
    mysqli_stmt_bind_param($res, "i", $id_editeur);
    mysqli_stmt_execute($res);

    // Lier le résultat à des variables PHP
    mysqli_stmt_bind_result($res, $nom_editeur);

    // Récupérer le résultat
    mysqli_stmt_fetch($res);

    // Retourner la moyenne des notes
    return $nom_editeur;
}

function selectAuteursByIdLivre($conn, $id_livre)
{
    $res = mysqli_prepare($conn, "SELECT nom_auteur, prenom_auteur, date_de_naissance, date_de_mort FROM auteur JOIN ecrit AS e ON e.id_auteur = auteur.id_auteur WHERE id_livre = ?");
    mysqli_stmt_bind_param($res, "i", $id_livre);
    mysqli_stmt_execute($res);

    // Créer un tableau pour stocker les noms des auteurs
    $auteurs = [];

    // Lier le résultat à des variables PHP
    mysqli_stmt_bind_result($res, $nom_auteur, $prenom_auteur, $date_de_naissance, $date_de_mort);

    // Récupérer le résultat
    while (mysqli_stmt_fetch($res)) {
        // Convertir les dates au format dd/mm/yyyy
        $date_naissance_formatee = DateTime::createFromFormat('Y-m-d', $date_de_naissance)->format('d/m/Y');
        $nom_complet = $prenom_auteur . " " . $nom_auteur . " (" . $date_naissance_formatee;

        if (!empty($date_de_mort)) {
            $date_mort_formatee = DateTime::createFromFormat('Y-m-d', $date_de_mort)->format('d/m/Y');
            $nom_complet .= " - " . $date_mort_formatee;
        }

        $nom_complet .= ")";
        $auteurs[] = $nom_complet;
    }

    // Retourner les noms des auteurs
    return $auteurs;
}


function selectAllAvisByIdLivre($conn, $id_livre, $offset, $limit)
{
    // Prepare the SQL statement
    $sql = "SELECT *
             FROM Avis 
             WHERE id_livre = ? 
             LIMIT ? OFFSET ?";

    // Initialize a statement and prepare the SQL
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        // Handle error
        echo "Error preparing statement: " . mysqli_error($conn);
        return false;
    }

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "iii", $id_livre, $limit, $offset);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result set from the statement
    $result = mysqli_stmt_get_result($stmt);

    if ($result === false) {
        // Handle error
        echo "Error executing statement: " . mysqli_stmt_error($stmt);
        return false;
    }

    return $result;
}

function selectCountAvis($conn, $id_livre)
{
    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "SELECT COUNT(*) AS nb_avis FROM Avis WHERE id_livre = ?");

    // Bind the $id_livre parameter to the SQL statement
    mysqli_stmt_bind_param($stmt, "i", $id_livre);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Bind the result to a variable
    mysqli_stmt_bind_result($stmt, $nb_avis);

    // Fetch the result
    mysqli_stmt_fetch($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    return $nb_avis;
}

function selectUtilisateurByIdUtilisateur($conn, $id_utilisateur)
{
    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, "SELECT prenom_utilisateur, nom_utilisateur FROM Utilisateur WHERE id_utilisateur = ?");

    // Bind the $id_utilisateur parameter to the SQL statement
    mysqli_stmt_bind_param($stmt, "i", $id_utilisateur);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    // Bind the result to variables
    mysqli_stmt_bind_result($stmt, $prenom, $nom);

    // Fetch the result
    mysqli_stmt_fetch($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Concatenate the first name and last name and return the result
    return $prenom . " " . $nom;
}
