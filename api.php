<?php
require 'vendor/autoload.php';
header('Content-Type: application/json');

use Elastic\Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()->setHosts(['http://localhost:9200'])->build();

try {
    $params = [
        'index' => '_all', // On cherche dans tous les index pour le test
        'body'  => [
            'query' => ['match_all' => (object)[]],
            'size'  => 100
        ]
    ];

    $results = $client->search($params);
    // On ne renvoie que la partie intéressante : les documents
    echo json_encode($results['hits']['hits']);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}