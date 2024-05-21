<?php
session_start();
require_once("./lib/database.php");

$email = $password = "";
$email_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'email est vide
    if (empty(trim($_POST["email"]))) {
        $email_err = "Veuillez entrer votre email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Vérifier si le mot de passe est vide
    if (empty(trim($_POST["password"]))) {
        $password_err = "Veuillez entrer votre mot de passe.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Valider les identifiants
    if (empty($email_err) && empty($password_err)) {
        // Appeler la fonction de connexion
        $user_id = login($conn, $email, $password);

        if ($user_id) {
            // Rediriger vers la page avec l'ID de l'utilisateur
            header("Location: ./livres.php?user=$user_id");
            exit;
        } else {
            $login_err = "L'email ou le mot de passe est incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./src/styles/global.css">
    <link rel="stylesheet" type="text/css" href="./src/styles/login.css">
    <title>Login Page</title>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                <span class="error-message"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span class="error-message"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Login">
            </div>
            <span class="error-message"><?php echo $login_err; ?></span>
        </form>
    </div>
</body>
</html>

<?php
// Fonction pour vérifier les informations de connexion
function login($conn, $email, $password) {
    // Préparer une requête SQL sécurisée pour éviter les injections SQL
    $stmt = $conn->prepare("SELECT id_utilisateur, mot_de_passe FROM Utilisateur WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

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
?>
