<?php

$loader = new \Phalcon\Loader();

$loader->registerNamespaces([
    'BCF\Controllers' => $config->application->controllersDir,
    'BCF\Models' => $config->application->modelsDir,
])->register();
