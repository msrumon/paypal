<?php

use GuzzleHttp\Exception\ClientException;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /');
    exit;
}

try {
    $client = require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'client.php';
    $response = $client->post('v2/checkout/orders', [
        'json' => [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $_POST['amount'],
                    ],
                ],
            ],
            'application_context' => [
                'shipping_preference' => 'NO_SHIPPING',
            ],
        ],
    ]);
    http_response_code($response->getStatusCode());
    echo $response->getBody()->getContents();
} catch (ClientException $e) {
    http_response_code($e->getResponse()->getStatusCode());
    echo $e->getResponse()->getBody()->getContents();
}
