<?php

namespace PHPGitAdmin\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;

class IndexController implements ControllerProviderInterface {

    public function connect(Application $app) {
       $controller = $app['controllers_factory'];
       $controller->get('/',[$this,'index']);
       return $controller;
    }
    
    public function index(){
         return  'Hello World';
    }

}
