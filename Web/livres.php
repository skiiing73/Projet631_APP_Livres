<?php
require_once("./lib/database.php");

if (!isset($_SESSION["page"])) {
    require_once('./src/pages/welcome.php');
} else {
    if ($_SESSION["page"] == "welcome") {
        require_once('./src/pages/welcome.php');
    } else {
        require_once('./routes.php');
    }
}
