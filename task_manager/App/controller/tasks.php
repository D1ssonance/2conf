<?php

namespace App\controller;

class tasks extends Controller
{
    public function index($page)
    {
        if ($_POST['save']) {
            $this->model->addTask($_POST['username'], $_POST['email'], $_POST['task']);
        }

        $where = '';

        if ($_POST['status']) {
            $where = $_POST['status'] === 'done' ? '`status` = "done"' : ($_POST['status'] === 'all' ? '' :'`status` = "in progress"');
        }

        $sort = ['id', 'DESC'];

        if ($_POST['method']) {
            $column = $_POST['sort'] === 'date' ? 'id' : ($_POST['sort'] === 'user' ? 'username' : 'email');
            $method = $_POST['method'];
            $sort = [$column, $method];
        }

        $config['length'] = $this->model->countTasks($where);
        $config['per_page'] = 3;
        if (!$page) $page = 0;
        else $page = $page - 1;

        $data['tasks'] = $this->model->getTasks($config['per_page'], $page, $where, $sort);


        $data['paginationLinks'] = createPaginationLinks($config);

        $this->view->render('header');
        $this->view->render('task-manager', $data);
        $this->view->render('footer');
    }
}