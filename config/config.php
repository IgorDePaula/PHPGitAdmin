<?php

return function($app) {

    $app['debug'] = getenv('DEV');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__ . '/../views',
    ));
};
