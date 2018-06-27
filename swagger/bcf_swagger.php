<?php
require("../vendor/autoload.php");
$swagger = \Swagger\scan(__DIR__ . '/../api/app');
header('Content-Type: application/json');
echo $swagger;
