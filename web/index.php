<?php

require __DIR__.'/../vendor/autoload.php';

use Slim\Slim;

$app = new Slim();

$config = require __DIR__.'/../config/config.php';

$routes = require __DIR__.'/../routes/index.php';

$config($app);

$routes($app);

$app->run();