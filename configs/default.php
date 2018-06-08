<?php

$secret = require __DIR__ . '/secrets.php';

return [
    'db' => [
        'host' => '127.0.0.1',
        'dbName' => 'bcf_presentation',
        'driver' => 'mysql',
        'user' => $secret['dbUser'],
        'pass' => $secret['dbPass'],
    ],
    'logger' => [
        'name' => 'bcf_log',
        'level' => Monolog\Logger::ERROR,
        'file' => 'app.log',
    ],
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false,
];
