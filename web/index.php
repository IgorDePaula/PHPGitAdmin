<?php

require __DIR__.'/../vendor/autoload.php';

use Silex\Application;

$app = new Application();

$config = require __DIR__.'/../PHPGitAdmin/config/config.php';

$routes = require __DIR__.'/../PHPGitAdmin/routes/index.php';

$middleware = require __DIR__.'/../PHPGitAdmin/Middleware/auth.php';

$config($app);

$middleware($app);

$routes($app);

$app->boot();

$app->run();