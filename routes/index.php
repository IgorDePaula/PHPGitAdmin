<?php

use Symfony\Component\Process\Process;

return function($app) {

    $app->get('/', function()use ($app) {
        $process = new Process('dir');
        $process->run();
        if (!$process->isSuccessful()) {
            throw new \RuntimeException($process->getErrorOutput());
        }

        $result = $process->getOutput();
        $app->render('index.php', ['result' => $result]);
    });
};
