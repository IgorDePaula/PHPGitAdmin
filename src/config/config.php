<?php

use Silex\Application;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;
use Symfony\Component\Security\Core\User\User;

return function(Application $app) {

    $app['admin.password'] = 'admin';
    $app['admin.user'] = 'admininstrator';
    $app['admin.salt'] = 'thisnameprojectisphpgitadmin';
    
    $app['security.encoder.digest'] = $app->share(function ($app) {
        return new BCryptPasswordEncoder(14);
    });
    $user = new User($app['admin.user'], $app['admin.password']);
    
    $password = $app['security.encoder.digest']->encodePassword($user->getPassword(),$app['admin.salt']);
    
    $app['debug'] = getenv('DEV');

    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__ . '/../views'));

    $app->register(new Silex\Provider\SessionServiceProvider());

    $app->register(new Silex\Provider\UrlGeneratorServiceProvider());

    $app->register(new Silex\Provider\SecurityServiceProvider(), array(
        'security.firewalls' => array(
            'login' => array('pattern' => '^/login$'),
            'secured' => array(
                'pattern' => '^.*$',
                'http' => true,
                'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
                'logout' => array('logout_path' => '/logout', 'invalidate_session' => true),
                'users' => array($app['admin.user'] => array('ROLE_ADMIN', $password)),
            ),
        )
    ));
};
