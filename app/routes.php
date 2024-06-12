<?php

namespace App\Controllers;
use App\Controllers\AdminController;
use App\Core\Router;
use App\Controllers\Controlador;

    $router->get('logout', 'AdminController@logout');
    $router->post('efetuaLogin', 'AdminController@efetuaLogin');
    $router->get('login', 'AdminController@login');
    $router->get('users', 'AdminController@index');
    $router->post('create', 'AdminController@create');
    $router->post('delete', 'AdminController@delete');
    $router->post('edit', 'AdminController@edit');

    $router->get('posts', 'Controlador@tabelaPosts');
    $router->post('post/criar', 'Controlador@criar');
    $router->post('post/editar', 'Controlador@editar');
    $router->post('post/deletar', 'Controlador@deletar');

    $router->get('dashboard', 'Controlador@dashboard');
    $router->get('listaPosts', 'AdminController@listaPosts');
    $router->get('','Controlador@landingPage');
    $router->get('publicacoes', 'Controlador@tabelaPostsUser');
    $router->get('publicacoes/post','Controlador@verPost');
?>