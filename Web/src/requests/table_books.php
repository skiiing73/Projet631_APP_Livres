<?php
function selectAllLivre($conn, $offset, $limit)
{
    // Prepare the SQL statement
    $sql = "SELECT id_livre, nom_livre, date_de_publication, genre 
             FROM Livre 
             ORDER BY date_de_publication ASC 
             LIMIT ? OFFSET ?";

    // Initialize a statement and prepare the SQL
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        // Handle error
        echo "Error preparing statement: " . mysqli_error($conn);
        return false;
    }

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ii", $limit, $offset);

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

function selectCountLivre($conn)
{
    $sql = "SELECT COUNT(*) AS nb_livre FROM Livre";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['nb_livre'];
    } else {
        // Handle error
        echo "Error: " . mysqli_error($conn);
        return false;
    }
}

function selectAverageRateReview($conn, $id_livre)
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


function selectAllLivreOrder($conn, $order, $offset, $limit)
{
    if ($order == 0) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY nom_livre ASC LIMIT ? OFFSET ?";
    } else if ($order == 1) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY nom_livre DESC LIMIT ? OFFSET ?";
    } else if ($order == 2) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY genre ASC LIMIT ? OFFSET ?";
    } else if ($order == 3) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY genre DESC LIMIT ? OFFSET ?";
    } else if ($order == 4) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY date_de_publication ASC LIMIT ? OFFSET ?";
    } else if ($order == 5) {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY date_de_publication DESC LIMIT ? OFFSET ?";
    } else {
        $sql = "SELECT id_livre, nom_livre,date_de_publication,genre FROM Livre ORDER BY date_de_publication ASC LIMIT ? OFFSET ?";
    }
    // Initialize a statement and prepare the SQL
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        // Handle error
        echo "Error preparing statement: " . mysqli_error($conn);
        return false;
    }

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ii", $limit, $offset);

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
