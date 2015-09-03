<?php

use Symfony\Component\HttpFoundation\RequestMatcher;

return function($app) {

    $app['admin.password'] = 'admin';
    $app['admin.user'] = 'admininstrator';

    $app['debug'] = getenv('DEV');

    //$encoder = $app['security.encoder_factory']->getEncoder($app['admin.user']);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__ . '/../views',
    ));

    $app->register(new Silex\Provider\SessionServiceProvider());

    $app->register(new Silex\Provider\UrlGeneratorServiceProvider());

    $app->register(new Silex\Provider\SecurityServiceProvider(), array(
        'security.firewalls' => array(
            'login' => array(
                'pattern' => '^/login$',
            ),
            'secured' => array(
                'pattern' => '^.*$',
                'http' => true,
                //'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
                'logout' => array('logout_path' => '/logout', 'invalidate_session' => true),
                'users' => array(
                    'admin' => array('ROLE_ADMIN', '5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg=='),
                ),
            ),
        )
    ));
};
