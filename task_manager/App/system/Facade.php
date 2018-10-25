<?php

namespace App\system;

class Facade
{
    public function run()
    {
        $request = explode('/', str_replace('index.php', '', $_SERVER['REQUEST_URI']));
        $destination = $request[2];
        $param = $request[3];

        if (empty($destination)) $destination = 'tasks';

        if (array_search($destination, CONTROLLERS) === false) {
            (new \App\view\view)->load404();
            die();
        }

        $ref = new \ReflectionClass('\App\controller\\' . $destination);
        $ref->newInstance()->index($param);
    }
}