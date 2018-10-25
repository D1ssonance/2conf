<?php

namespace App\controller;

abstract class Controller
{
    protected $model;
    protected $view;

    public function __construct()
    {
        $this->model = new \App\model\task_model;
        $this->view = new \App\view\view;
    }
}