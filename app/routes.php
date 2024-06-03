<?php

namespace App\Controllers;
use App\Controllers\AdminController;
use App\Core\Router;

    $router->get('users', 'AdminController@index');
    $router->post('create', 'AdminController@create');
    $router->post('delete', 'AdminController@delete');
    $router->post('edit', 'AdminController@edit');

?>