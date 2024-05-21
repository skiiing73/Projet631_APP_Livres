<?php
    // Les fonctions importés : 
    require_once("./src/requests/table_profile.php");
?>

<?php
// Check if a `user_id` is passed in the URL
if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']);

    // Function to get user information
    function getUserInfo($conn, $user_id) {
        $sql = "SELECT first_name, last_name, profile_picture FROM Users WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    // Call the function to get user information
    $user_info = getUserInfo($conn, $user_id);

    // If user information is successfully retrieved
    if ($user_info) {
        $first_name = htmlspecialchars($user_info['first_name']);
        $last_name = htmlspecialchars($user_info['last_name']);
        $profile_picture = htmlspecialchars($user_info['profile_picture']);
    } else {
        // Redirect to an error page if the user is not found
        header("Location: error.php");
        exit();
    }
} else {
    // Redirect to an error page if `user_id` is not provided
    header("Location: error.php");
    exit();
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
    <link rel="stylesheet" type="text/css" href="./src/styles/profile.css">
    <link rel="stylesheet" type="text/css" href="./src/components/navbar/navbar.css">
    <link rel="stylesheet" type="text/css" href="./src/components/footer/footer.css">
    <title>Profile utilisateur</title>
</head>

<body>
    <div class="user-profile-container">
        <div class="profile-picture">
            <img src="<?php echo $profile_picture; ?>" alt="Profile Picture">
        </div>
        <div class="user-info">
            <h2><?php echo $first_name . " " . $last_name; ?></h2>
        </div>
    </div>
</body>

<?php
    require_once("./src/components/footer/footer.php");
?>
</html>



