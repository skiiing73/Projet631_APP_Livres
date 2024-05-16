<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "livres_app";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Utilisateurs à insérer
$users = [
    ['Dupont', 'Jean', 'jean.dupont@example.com', 'password1', '2023-01-01'],
    ['Martin', 'Marie', 'marie.martin@example.com', 'password2', '2023-01-02'],
    ['Bernard', 'Pierre', 'pierre.bernard@example.com', 'password3', '2023-01-03'],
    // Ajoutez plus d'utilisateurs ici...
];

// Préparer la déclaration SQL
$stmt = $conn->prepare("INSERT INTO Utilisateur (nom_utilisateur, prenom_utilisateur, email, mot_de_passe, date_inscription) VALUES (?, ?, ?, ?, ?)");

foreach ($users as $user) {
    // Hacher le mot de passe
    $hashed_password = password_hash($user[3], PASSWORD_BCRYPT);

    // Lier les paramètres et exécuter
    $stmt->bind_param("sssss", $user[0], $user[1], $user[2], $hashed_password, $user[4]);
    $stmt->execute();
}

echo "Nouveaux enregistrements créés avec succès";

$stmt->close();
$conn->close();
?>
