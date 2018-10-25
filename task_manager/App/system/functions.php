<?php

function createPaginationLinks(array $config)
{

    $data = [];
    $url = explode('/', $_SERVER['REQUEST_URI']);
    $base = '/' . $url[1] . '/' . $url[2] . '/';

    if (empty($url[1]) || empty($url[2])) $base = '/index.php/tasks/';

    $pages = $config['length'] / $config['per_page'];
    $count = 0;
    while ($count < $pages) {
        if ($count == 0) {
            $data[] = ['link' => $base, 'page' => 1];
        } else {
            $data[] = ['link' => $base . ($count + 1), 'page' => $count + 1];
        }
        $count++;
    }

    return $data;
}