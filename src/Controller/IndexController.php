<?php

namespace PHPGitAdmin\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class IndexController implements ControllerProviderInterface {

    private $app = null;

    public function connect(Application $app) {
        $controller = $app['controllers_factory'];
        $this->app = $app;
        $controller->get('/', [$this, 'index']);
        $controller->get('/login', function(Request $request) use ($app) {
            return $app['twig']->render('login.html.twig', array(
                        'error' => $app['security.last_error']($request),
                        'last_username' => $app['session']->get('_security.last_username'),
            ));
        });
        return $controller;
    }

    public function index() {
        $app = $this->app;
        return $app['twig']->render('index.twig', ['name' => 'teste', 'app' => $app]);
    }

    public function login() {
        $app = $this->app;
        return $app['twig']->render('login.html.twig', array(
                    'error' => $app['security.last_error'](new Request()),
                    'last_username' => $app['session']->get('_security.last_username'),
        ));
    }

}
