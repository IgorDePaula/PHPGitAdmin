<?php

use PHPGitAdmin\Controller\IndexController;
use Silex\Application;

return function(Application $app) {
    
    $app->mount('/', new IndexController());
    
};
