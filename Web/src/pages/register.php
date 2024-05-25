<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $mdp = $_POST['mdp'];
    $mdp_validate = $_POST['mdp_validate'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Email invalide.";
    } elseif ($mdp !== $mdp_validate) {
        $error_message = "Les mots de passe ne correspondent pas.";
    } else {
        $stmt = $conn->prepare("SELECT id_utilisateur FROM utilisateur WHERE email = ?");
        if ($stmt === false) {
            $error_message = "Prepare failed: " . $conn->error;
        } else {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $error_message = "Un utilisateur avec cet email existe déjà.";
            } else {
                $hashed_password = password_hash($mdp, PASSWORD_BCRYPT);

                $today_date = date('Y-m-d');

                $stmt = $conn->prepare("INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, email, mot_de_passe, date_inscription) VALUES (?, ?, ?, ?, ?)");
                if ($stmt === false) {
                    $error_message = "Prepare failed: " . $conn->error;
                } else {
                    $bind = $stmt->bind_param("sssss", $nom, $prenom, $email, $hashed_password, $today_date);
                    if ($bind === false) {
                        $error_message = "Bind failed: " . $stmt->error;
                    } else {
                        $exec = $stmt->execute();
                        if ($exec) {
                            $success_message = "Utilisateur créé avec succès.";
                        } else {
                            $error_message = "Erreur: " . $stmt->error;
                        }
                    }
                    $stmt->close();
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("./src/components/navbar/navbar.php"); ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/register.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>Register</title>
</head>

<body>
    <?php
    if (isset($error_message)) {
        echo "<p id='message' style='color:red;'>$error_message</p>";
    }
    if (isset($success_message)) {
        echo "<p id='message' style='color:green;'>$success_message</p>";
    }
    ?>
    <form method="POST">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" id="mdp" name="mdp" required>
        </div>
        <div class="form-group">
            <label for="mdp_validate">Validation du mot de passe</label>
            <input type="password" id="mdp_validate" name="mdp_validate" required>
        </div>
        <button type="submit">S'enregistrer</button>

        <p class="login">Vous avez déjà un compte ?</p>
        <p class="login">Cliquez <a href="./livres.php?pages=login">ici</a> pour vous connectez.</p>
    </form>

    <?php require_once("./src/components/footer/footer.php"); ?>
</body>

</html>