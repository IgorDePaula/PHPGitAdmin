<?php

return function($app){
    
    $app['debug'] = getenv('DEV');
    
   // $app->config('templates.path',__DIR__.'/../views/');
    
};