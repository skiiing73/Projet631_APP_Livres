<!DOCTYPE html>
<html lang="fr">

<?php
// Session 
$_SESSION['page'] = "login";
// Les fonctions importés : 
require_once("./src/requests/table_login_register.php");
?>

<head>
    <meta charset="UTF-8">
    <?php

    ?>
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/welcome.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>Page de connexion</title>
</head>

<body>
    <?php
        require_once("./src/components/navbar/navbar.php");
        var_dump($conn);

        // Vérifier si le formulaire de connexion a été soumis
        if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Valider le nom d'utilisateur
        if(empty(trim($_POST["username"]))) {
            $username_err = "Veuillez entrer votre nom d'utilisateur.";
        } else {
            $username = trim($_POST["username"]);
        }
        
        // Valider le mot de passe
        if(empty(trim($_POST["password"]))) {
            $password_err = "Veuillez entrer votre mot de passe.";
        } else {
            $password = trim($_POST["password"]);
        }
        
        // Vérifier s'il n'y a pas d'erreur de saisie
        if(empty($username_err) && empty($password_err)) {
            // Vérifier les informations de connexion dans la base de données
            $user_id = login($conn, $username, $password);
            if($user_id) {
                // Authentification réussie, enregistrer l'ID de l'utilisateur dans la session
                $_SESSION['user_id'] = $user_id;
                header("Location: welcome.php"); // Rediriger vers la page d'accueil après connexion réussie
                exit();
            } else {
                // Afficher un message d'erreur si les informations de connexion sont incorrectes
                $login_err = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }
    }
    ?>

    <div class="login-container">
        <h2>Connexion</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nom d'utilisateur</label>
                <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Se connecter">
            </div>
            <p>Vous n'avez pas de compte? <a href="register.php">Inscrivez-vous ici</a>.</p>
            <span class="help-block"><?php echo $login_err; ?></span>
        </form>
    </div>

    <?php
    require_once("./src/components/footer/footer.php");
    ?>
</body>
</html>



