<?php
require_once("./lib/database.php");


if (!isset($_GET["pages"])) {
    require_once('./src/pages/welcome.php');
} else {
    if ($_GET["pages"] == "welcome") {
        require_once('./src/pages/welcome.php');
    } else if ($_GET["pages"] == "login") {
        require_once('./src/pages/login.php');
    } else if ($_GET["pages"] == "books") {
        require_once('./src/pages/books.php');
    } else {
        require_once('./src/pages/welcome.php');
    }
}

?>