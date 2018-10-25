<?php

function autoload($class) {

    $baseDir = ROOT_DIR;

    $path = $baseDir . '/' . $class . '.php';

    if(file_exists($path)) require $path;
}