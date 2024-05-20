<?php
    // Vérifier si l'utilisateur est déjà connecté, si oui le rediriger vers la page d'accueil
    if(isset($_SESSION['first_name'])) {
        header("Location: ./livres.php?pages=welcome");
        exit();
    }

    require_once("./lib/database.php");

    // Initialisation des variables d'erreur
    $username_err = $password_err = $password_confirmation_err = $register_err = "";

    // Vérifier si le formulaire de soumission a été envoyé
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // Valider le prénom de l'utilisateur
        if(empty(trim($_POST["first_name"]))) {
            $first_name_err = "Veuillez entrer votre prénom.";
        } else {
            $first_name = trim($_POST["first_name"]);
        }

        // Valider le nom de famille de l'utilisateur
        if(empty(trim($_POST["last_name"]))) {
            $last_name_err = "Veuillez entrer votre nom de famille.";
        } else {
            $last_name = trim($_POST["last_name"]);
        }

        // Valider le mot de passe
        if(empty(trim($_POST["password"]))) {
            $password_err = "Veuillez entrer votre mot de passe.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Valider la confirmation du mot de passe
        if(empty(trim($_POST["password_confirmation"]))) {
            $password_confirmation_err = "Veuillez confirmer votre mot de passe.";
        } else {
            $password_confirmation = trim($_POST["password_confirmation"]);
            if($password != $password_confirmation) {
                $password_confirmation_err = "Les mots de passe ne correspondent pas.";
            }
        }

        // Vérifier s'il n'y a pas d'erreur de saisie
        if(empty($first_name_err) && empty($last_name_err) && empty($password_err) && empty($password_confirmation_err)) {
            // Ajouter l'utilisateur à la base de données
            $date_inscription = date("Y-m-d");
            $added = addUser($conn, $first_name, $last_name, $email, $password, $date_inscription);
            if ($added) {
                // Afficher le message d'inscription réussie
                echo '<p>Inscription réussie. Redirection vers la page de connexion dans quelques secondes...</p>';
            
                // Attendre pendant 4 secondes
                sleep(4);
            
                // Rediriger l'utilisateur vers la page de connexion
                header("Location: login.php");
                exit(); // Terminer le script après la redirection
            } else {
                $register_err = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
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
    <link rel="stylesheet" type="text/css" href="./src/styles/register.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>Page de connexion</title>
</head>

<body>
    <div class="register-container">
        <h2>Inscription</h2>
        <form id="register-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
                <span class="error-message"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password">
                <span class="error-message"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirmation du mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
                <span class="error-message"><?php echo $password_confirmation_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="S'inscrire">
            </div>
            <div class="login-link">
                <p>Déjà inscrit? <a href="./livres.php?pages=login">Connectez-vous ici</a>.</p>
            </div>
            <span class="error-message"><?php echo $register_err; ?></span>
        </form>
    </div>
</body>


<?php
    require_once("./src/components/footer/footer.php");
?>
</html>
