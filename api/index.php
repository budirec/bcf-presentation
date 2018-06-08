<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/vendor/autoload.php';

$config = require __DIR__ . '/../configs/default.php';

$app = new \Slim\App;

$container = $app->getContainer(['settings' => $config]);

$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Logger($settings['logger']['name']);

    $level = $settings['logger']['level'];
    if (!isset($level)) {
        $level = Logger::ERROR;
    }

    $logFile = $settings['logger']['file'];
    $handler = new RotatingFileHandler($logFile, 0, $level, true, 0775);
    $logger->pushHandler($handler);

    return $logger;
};

$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO($db['driver'] . ':host=' . $db['host'] . ';dbname=' . $db['dbname'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    $this->logger->addInfo('Hellp, ' . $name);

    return $response;
});

$app->get('/presentations', function (Request $request, Response $response, array $args) {

});


$app->run();
