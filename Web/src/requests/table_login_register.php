<?php
// Fonction pour vérifier les informations de connexion
function login($conn, $email, $password)
{
    // Sélectionner l'ID de l'utilisateur et son mot de passe haché à partir de la base de données
    $sql = "SELECT id_utilisateur FROM Utilisateur WHERE email = '$email' AND mot_de_passe = '$password'";
    $result = $conn->query($sql);

    // Vérifier s'il y a un enregistrement correspondant à l'email fourni
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['mot_de_passe'];

        // Vérifier si le mot de passe fourni correspond au mot de passe haché en base de données
        if (password_verify($password, $hashed_password)) {
            // Authentification réussie, retourner l'ID de l'utilisateur
            return $row['id_utilisateur'];
        }
    }

    // Si aucune correspondance n'est trouvée ou si le mot de passe est incorrect, retourner false
    return false;
}

// Fonction pour ajouter un nouvel utilisateur
function addUser($conn, $nom, $prenom, $email, $password, $date_inscription)
{
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO Utilisateur (nom_utilisateur, prenom_utilisateur, email, mot_de_passe, date_inscription) VALUES ('$nom', '$prenom', '$email', '$hashed_password', '$date_inscription')";
    $success = $conn->query($sql);
    $conn->close();
    return $success;
}

function getUserFirstName($conn, $user_id)
{
    // Préparer la requête pour récupérer le prénom de l'utilisateur en fonction de son ID
    $sql = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = $user_id";
    $result = $conn->query($sql);

    // Vérifier si un enregistrement correspondant à l'ID de l'utilisateur est trouvé
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Retourner le prénom de l'utilisateur
        return $row['prenom'];
    } else {
        // Si aucun enregistrement n'est trouvé, retourner une chaîne vide ou une valeur par défaut selon votre besoin
        return "";
    }
}
