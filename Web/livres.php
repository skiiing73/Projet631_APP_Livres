<?php
require_once("./lib/database.php");


if (!isset($_GET["page"])) {
    require_once('./src/pages/welcome.php');
} else {
    if ($_GET["page"] == 1) {
        require_once('./src/pages/welcome.php');
    } else if ($_GET["page"] == 2) {
        require_once('./src/pages/login.php');
    } else {
        require_once('./src/pages/welcome.php');
    }
}
