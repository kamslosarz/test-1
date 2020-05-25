<?php

use App\App;

require '../vendor/autoload.php';

try
{
    $app = new App();
    $app->validate($argv);
    $file = $app($argv[1], $argv[2], $argv[3]);

    echo 'Kody zostały wygenerowane do pliku ' . $file . PHP_EOL;
}
catch(\Exception $exception)
{
    echo $exception->getMessage() . PHP_EOL;
}
