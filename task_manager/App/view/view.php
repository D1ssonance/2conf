<?php

namespace App\view;

class view
{
    protected $view;

    public function __construct()
    {
        $this->view = ROOT_DIR . '/template/';
    }

    public function load404()
    {
        require $this->view . 'errors/404.php';
        die();
    }

    public function load($page)
    {
        $path = $this->view . $page . '.php';
        if(file_exists($path)) return $path;
        else $this->load404();
    }

    public function render($template, array $content = [])
    {
        extract($content);
        require $this->load($template);
    }
}