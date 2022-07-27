<?php

use GuzzleHttp\Exception\ClientException;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /');
    exit;
}

try {
    $client = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'client.php';
    $response = $client->post('v2/checkout/orders/' . $_POST['id'] . '/capture', [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
    ]);
    http_response_code($response->getStatusCode());
    echo $response->getBody()->getContents();
} catch (ClientException $e) {
    http_response_code($e->getResponse()->getStatusCode());
    echo $e->getResponse()->getBody()->getContents();
}
