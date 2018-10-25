<?php

require __DIR__ . '/App/system/constants.php';
require __DIR__ . '/App/system/functions.php';
require __DIR__ . '/App/system/autoload.php';

spl_autoload_register('autoload');

(new \App\system\Facade)->run();