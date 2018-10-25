<?php

namespace App\model;

class Database
{
    protected $pdo;
    protected $data;

    public function __construct()
    {
        $this->pdo = new \PDO(DB_DSN, DB_USER, DB_PASS);
    }

    public function query($query)
    {
        $this->data = $this->pdo->query($query);
        return $this;
    }

    public function fetchAll()
    {
        if (!$this->data) return null;
        return $this->data->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function quote(string $string)
    {
        return $this->pdo->quote($string);
    }
}