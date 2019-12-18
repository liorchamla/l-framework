<?php

use Framework\App;
use Symfony\Component\HttpFoundation\Request;

require "../vendor/autoload.php";

$request = Request::createFromGlobals();
$routesMap = require "../src/routes.php";

$app = new App();
$response = $app->run($request, $routesMap);
$response->send();
