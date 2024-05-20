<?php

    // Vérifier si l'utilisateur est déjà connecté, si oui le rediriger vers la page d'accueil
    if(isset($_SESSION['first_name'])) {
        header("Location: ./livres.php?pages=welcome");
        exit();
    }
    // Les fonctions importés : 
    require_once("./src/requests/table_login_register.php");

    // Initialisation des variables d'erreur
    $email_err = $password_err = $password_confirmation_err = $login_err = "";

    // Vérifier si le formulaire de connexion a été soumis
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    
        // Valider le nom d'utilisateur
        if(empty(trim($_POST["email"]))) {
            $email_err = "Veuillez entrer votre nom email.";
        } else {
            $email = trim($_POST["email"]);
        }
        
        // Valider le mot de passe
        if(empty(trim($_POST["password"]))) {
            $password_err = "Veuillez entrer votre mot de passe.";
        } else {
            $password = trim($_POST["password"]);
        }
        
        // Vérifier s'il n'y a pas d'erreur de saisie
        if(empty($email_err) && empty($password_err)) {
            sleep(4);
            // Vérifier les informations de connexion dans la base de données
            $user_id = login($conn, $email, $password);
            if($user_id) {
                // Afficher le message d'inscription réussie
                echo '<p>Connexion réussie. Redirection vers la page de principale dans quelques secondes...</p>';
            
                // Attendre pendant 4 secondes
                sleep(4);

                // Authentification réussie, enregistrer le prénom de l'utilisateur dans la session
                $first_name = getUserFirstName($conn, $user_id);
                $_SESSION['first_name'] = $first_name;
                header("Location: welcome.php"); // Rediriger vers la page d'accueil après connexion réussie
                exit();
            } else {
                // Afficher un message d'erreur si les informations de connexion sont incorrectes
                $login_err = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
        require_once("./src/components/navbar/navbar.php");
    ?>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/login.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>Page de connexion</title>
</head>

<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nom d'utilisateur</label>
                <input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Mot de passe</label>
                <input type="password" name="password">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Se connecter">
            </div>
            <p>Vous n'avez pas de compte? <a href="./livres.php?pages=register">Inscrivez-vous ici</a>.</p>
            <span class="help-block"><?php echo $login_err; ?></span>
        </form>
    </div>

    <?php
    require_once("./src/components/footer/footer.php");
    ?>
</body>
</html>



