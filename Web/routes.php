<?php
require_once("./lib/database.php");

if (!isset($_SESSION["page"])) {
    require_once('./src/pages/welcome.php');
} else {
    // blabla
    if ($_SESSION["page"] == 1) {
        require_once('./src/pages/welcome.php');
    } else {
        require_once('./routes.php');
    }
}
