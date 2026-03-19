<?php
    $host = 'localhost';
    $dbname = 'u577654037_sharetolearn';
    $username = 'u577654037_sharetolearn';
    $password = 'Sharetolearn@2026';

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