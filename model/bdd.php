<?php
    $host = 'localhost';
    $dbname = 'arptc_monitoring';
    $username = 'root';
    $password = 'LIThelp@2024';

    try {
        $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $GLOBALS['bdd'] = $bdd;
    } catch (PDOException $e) {
        echo "Échec de la connexion : " . $e->getMessage();
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 
?>