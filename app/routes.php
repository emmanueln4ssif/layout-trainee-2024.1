<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

    $router->get('users', 'AdminController@index');
    $router->post('users', 'AdminController@create');
    $router->post('users', 'AdminController@delete');
?>