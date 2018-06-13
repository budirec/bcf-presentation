<?php

/**
 * Registering an autoloader
 */
$loader = new \Phalcon\Loader();

$loader->registerNamespaces([
    'BCF\Models' => $config->application->modelsDir,
])->register();
