<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;
use App\Routes\Web as WebRoutes;


$app = new Application();

$routes = new WebRoutes($app->router);

$routes->run();

$app->run();
