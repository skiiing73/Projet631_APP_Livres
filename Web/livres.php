<?php
    require_once("./lib/database.php");
    session_start();

    if (!isset($_SESSION['user_id']) && !isset($_GET['pages'])) {
        header("Location: ./livres.php?pages=login");
        exit();
    } else {
        if (!isset($_GET["pages"])) {
            require_once('./src/pages/new_welcome.php');
        } else {
            if ($_GET["pages"] == "new_welcome") {
                require_once('./src/pages/new_welcome.php');
            } else if ($_GET["pages"] == "login") {
                require_once('./src/pages/login.php');
            } else if ($_GET["pages"] == "register") {
                require_once('./src/pages/register.php');
            } else if ($_GET["pages"] == "books") {
                require_once('./src/pages/books.php');
            } else if ($_GET["pages"] == "books_details") {
                require_once('./src/pages/books_details.php');
            } else if ($_GET["pages"] == "profile") {
                require_once('./src/pages/profile.php');
            } else {
                require_once('./src/pages/new_welcome.php');
            }
        }
    }    
?>
