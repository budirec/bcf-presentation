<?php

/** @var \Phalcon\Mvc\Router $router */
$router = $di->getRouter();

$router->setDefaultNamespace('BCF\Controllers');

// Define your routes here

$router->handle();
