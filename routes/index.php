<?php

return function($app) {
    $app->get('/', function()use ($app) {
      $app->render('index.php');
    });
};
