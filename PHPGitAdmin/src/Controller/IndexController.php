<?php

namespace PHPGitAdmin\Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;

class IndexController implements ControllerProviderInterface 
{
    private $app = null;
    
    public function connect(Application $app) {
       $controller = $app['controllers_factory'];
       $this->app = $app;
       $controller->get('/',[$this,'index']);
       return $controller;
    }
    
    public function index(){
         $app = $this->app;
         return $app['twig']->render('index.twig',['name'=>'teste']);        
    }

}
