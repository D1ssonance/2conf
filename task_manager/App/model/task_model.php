<?php

namespace App\model;

class task_model extends Model
{
    public function countTasks(string $where = '')
    {
        if (!empty($where)) $where = 'WHERE ' . $where;

        return $this->db->query('SELECT COUNT(*) as total FROM `tasks`' . $where)->fetchAll()[0]['total'];

    }

    public function addTask($name, $email, $task)
    {
        $name = $this->db->quote($name);
        $email = $this->db->quote($email);
        $task = $this->db->quote($task);

        $this->db->query('INSERT INTO `tasks` (username, email, task) VALUES (' . $name . ', ' . $email . ', ' . $task .')');
    }

    public function getTasks(int $limit, int $page, string $where = '', array $sort = ['id', 'DESC'])
    {
        if (!empty($where)) $where = 'WHERE ' . $where;
        $offset = $page * $limit;
        return $this->db->query('SELECT * FROM `tasks`' . $where . ' ORDER BY ' . $sort[0] . ' ' . $sort[1] . ' LIMIT ' . $limit . ' OFFSET ' . $offset)->fetchAll();

    }
}