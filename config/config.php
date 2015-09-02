<?php

return function($app){
    
    $app->config('debug',  getenv('DEV'));
    
    $app->config('templates.path',__DIR__.'/../views/');
    
};