<?php
require_once("./lib/database.php");

// Fonction pour vérifier les informations de connexion
function login($conn, $username, $password) {
    $sql = "SELECT id_utilisateur, mot_de_passe FROM Utilisateur WHERE nom_utilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['mot_de_passe'])) {
            return $row['id_utilisateur'];
        }
    }
    return false;
};

// Fonction pour ajouter un nouvel utilisateur
function addUser($conn, $nom, $prenom, $email, $password, $date_inscription) {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO Utilisateur (nom_utilisateur, prenom_utilisateur, email, mot_de_passe, date_inscription) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nom, $prenom, $email, $hashed_password, $date_inscription);
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $success;
}

?>