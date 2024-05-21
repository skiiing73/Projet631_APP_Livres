<?php
require_once("./lib/database.php");

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

function selectAuthorByBookID($conn, $id_livre) {
    // Préparer la requête SQL pour obtenir les détails des auteurs par ID de livre
    $res = mysqli_prepare($conn, "SELECT id_auteur, nom_auteur, prenom_auteur FROM auteur NATURAL JOIN ecrit WHERE id_livre = ?");
    mysqli_stmt_bind_param($res, "i", $id_livre);
    mysqli_stmt_execute($res);

    // Créer un tableau pour stocker les informations des auteurs
    $auteurs = [];

    // Lier le résultat à des variables PHP
    mysqli_stmt_bind_result($res, $id_auteur, $nom_auteur, $prenom_auteur);

    // Récupérer le résultat
    while (mysqli_stmt_fetch($res)) {
        $auteurs[] = [
            'id_auteur' => $id_auteur,
            'nom_auteur' => $nom_auteur,
            'prenom_auteur' => $prenom_auteur
        ];
    }

    // Retourner le tableau associatif contenant les informations des auteurs
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

function submitReview($conn, $user_id, $book_id, $rating, $review) {
    // Vérifier si l'utilisateur est connecté
    if (!$user_id) {
        return "Vous devez être connecté pour laisser un avis.";
    }

    // Vérifier la longueur de la revue
    if (strlen($review) < 50) {
        return "Votre avis doit contenir au moins 50 caractères.";
    }

    // Vérifier si une note est fournie
    if (!$rating) {
        return "Veuillez sélectionner une note.";
    }

    // Insérer l'avis dans la base de données
    $sql = "INSERT INTO avis (id_utilisateur, id_livre, note, commentaire) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $user_id, $book_id, $rating, $review);
    if ($stmt->execute()) {
        return true; // Succès
    } else {
        return "Une erreur s'est produite lors de l'ajout de votre avis. Veuillez réessayer.";
    }
}


?>