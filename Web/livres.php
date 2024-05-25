<?php
<<<<<<< HEAD
=======

if (!isset($_GET['id_utilisateur']) && !isset($_GET['pages'])) {
    header("Location: ./livres.php?pages=login");
    exit();
}

>>>>>>> origin/Web
require_once("./lib/database.php");


if (!isset($_GET["pages"])) {
    $_SESSION["id_user"] = "";
    require_once('./src/pages/new_welcome.php');
} else {
    if ($_SESSION["id_user"] == null) {
        $_SESSION["id_user"] = "";
    }
    if ($_GET["pages"] == "welcome") {
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
    } else if ($_GET["pages"] == "disconnect" && $_SESSION["id_user"] != "") {
        $_SESSION["id_user"] = "";
        require_once('./src/pages/new_welcome.php');
    } else {
        $_SESSION["id_user"] = "";
        require_once('./src/pages/new_welcome.php');
    }
}
