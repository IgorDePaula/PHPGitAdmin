<?php

require __DIR__.'/../vendor/autoload.php';

use Silex\Application;

$app = new Application();

$config = require __DIR__.'/../src/config/config.php';

$routes = require __DIR__.'/../src/routes/index.php';

$config($app);

$routes($app);

$app->boot();

$app->run();