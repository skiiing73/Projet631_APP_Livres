<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming $conn is a valid mysqli connection
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT id_utilisateur, mot_de_passe FROM utilisateur WHERE email = ?");
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id_utilisateur, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION["id_user"] = $id_utilisateur;
                header("Location: ./livres.php?pages=welcome");
                exit();
            } else {
                $error_message = "Mot de passe incorrect.";
            }
        } else {
            $error_message = "Aucun utilisateur avec cette adresse email.";
        }

        $stmt->close();
    } else {
        $error_message = "Erreur de préparation de la requête: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require_once("./src/components/navbar/navbar.php"); ?>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/login.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>Login Page</title>
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
            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Connexion</button>

        <p class="login">Vous n'avez pas de compte ?</p>
        <p class="login">Cliquez <a href="./livres.php?pages=register">ici</a> pour s'inscire.</p>
    </form>

    <?php require_once("./src/components/footer/footer.php"); ?>
</body>

</html>