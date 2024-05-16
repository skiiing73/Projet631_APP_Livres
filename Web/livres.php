<?php

    /* Connexion à la base de données sur le serveur de baptiste */
    $conn = @mysqli_connect($mysqlHost, $mysqlUsername, $mysqlPassword);    

    if (mysqli_connect_errno()) {
        $msg = "erreur ". mysqli_connect_error();
    } else {  
        $msg = "connecté au serveur " . mysqli_get_host_info($conn);
        /*Sélection de la base de données*/
        mysqli_select_db($conn, $mysqlDatabase); 
    
        /*Encodage UTF8 pour les échanges avecla BD*/
        mysqli_query($conn, "SET NAMES UTF8");
    }

    require_once("./lib/database.php");

    if (!isset($_GET["pages"])) {
        require_once('./src/pages/welcome.php');
    } else {
        if ($_GET["pages"] == "welcome") {
            require_once('./src/pages/welcome.php');
        } else if ($_GET["pages"] == "login") {
            require_once('./src/pages/login.php');
        } else {
            require_once('./src/pages/welcome.php');
        }
    }

?>