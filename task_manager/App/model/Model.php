<?php

namespace App\model;

abstract class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

}