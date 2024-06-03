<?php

namespace App\Controllers;
use App\Controllers\Controlador;
use App\Core\Router;

    $router->get('posts', 'Controlador@tabelaPosts');
    $router->post('post/criar', 'Controlador@criar');
    $router->post('post/editar', 'Controlador@editar');
    $router->post('post/delete', 'Controlador@deletar');

?>