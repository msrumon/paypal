<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use Dotenv\Dotenv;

Dotenv::createImmutable(__DIR__)->safeLoad();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <script src="https://www.paypal.com/sdk/js?client-id=<?= $_ENV['PAYPAL_CLIENT_ID'] ?>" defer data-namespace="PayPalSDK"></script>
    <script src="paypal.js" defer></script>
</head>

<body>
    <h1>Cart</h1>
    <p>Amount: &dollar;123.45</p>
    <section id="paypal"></section>
</body>

</html>