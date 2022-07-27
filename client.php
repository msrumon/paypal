<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Dotenv\Dotenv;
use GuzzleHttp\Client;

Dotenv::createImmutable(__DIR__)->safeLoad();

$token = json_decode(
    (new Client())->post('v1/oauth2/token', [
        'base_uri' => $_ENV['PAYPAL_API_URL'],
        'auth' => [
            $_ENV['PAYPAL_CLIENT_ID'],
            $_ENV['PAYPAL_CLIENT_SECRET'],
        ],
        'form_params' => [
            'grant_type' => 'client_credentials',
        ],
    ])->getBody()->getContents()
)->access_token;

$client = new Client([
    'base_uri' => getenv('PAYPAL_API_URL'),
    'headers' => [
        'Authorization' => 'Bearer ' . $token,
    ],
]);
return $client;
