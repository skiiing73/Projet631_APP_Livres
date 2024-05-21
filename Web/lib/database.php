<?php
require_once('./../../config_bd.php');
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// // Fonction session_start() crée une session ou restaure celle trouvée sur le serveur, via l'identifiant						//
// // de session passé dans une requête GET, POST ou par un cookie.																//
// // Fonction ob_start() permet d'utiliser les fonctions header.																	//
// //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
session_save_path('/home/' . $mysqlUsername2 . '/public_html/Projet631_APP_Livres/Web/session');

/*Connexion à la base de données sur le serveur tp-epua*/
$conn = @mysqli_connect($mysqlHost, $mysqlUsername, $mysqlPassword);

if (mysqli_connect_errno()) {
    $msg = "erreur " . mysqli_connect_error();
} else {
    $msg = "connecté au serveur " . mysqli_get_host_info($conn);
    /*Sélection de la base de données*/
    mysqli_select_db($conn, $mysqlDatabase);

    /*Encodage UTF8 pour les échanges avecla BD*/
    mysqli_query($conn, "SET NAMES UTF8");
}
