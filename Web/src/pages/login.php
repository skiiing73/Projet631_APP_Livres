<?php

// Include the database configuration file
require_once('./src/requests/table_login_register.php');

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION['user_id'])) {
    header("Location: ./livres.php?pages=welcome");
    exit();
}

// Initialize error variables
$email_err = $password_err = $login_err = "";

// Process the form when it is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($email_err) && empty($password_err)) {
        // Check the credentials in the database
        $user_id = login($conn, $email, $password);
        if ($user_id) {

            // Store user data in session variables
            $_SESSION['user_id'] = $user_id;

            // JavaScript for showing success message and redirecting after 4 seconds
            echo '<script>
                    alert("Login successful. Redirecting to the main page...");
                    setTimeout(function() {
                        window.location.href = "welcome.php";
                    }, 4000);
                  </script>';
        } else {
            $login_err = "Incorrect email or password.";
        }
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
            <div class="register-link">
                <p>Don't have an account?</p>
                <a href="./livres.php?pages=register">Register here</a>.
            </div>
            <span class="error-message"><?php echo $login_err; ?></span>
        </form>
    </div>

    <?php require_once("./src/components/footer/footer.php"); ?>
</body>
</html>
