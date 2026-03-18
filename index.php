<?php
require 'vendor/autoload.php';

use Elastic\Elasticsearch\ClientBuilder;

// Tentative de connexion simplifiée
try {
    $client = ClientBuilder::create()
        ->setHosts(['http://localhost:9200'])
        ->build();

    $info = $client->info();
    echo "<h1>🚀 Succès total !</h1>";
    echo "Connecté à l'index de : " . $info['cluster_name'];
} catch (Exception $e) {
    echo "<h1>⚠️ Presque bon...</h1>";
    echo "Erreur : " . $e->getMessage();
}