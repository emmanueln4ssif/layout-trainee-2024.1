<?php

namespace App\Controllers;
use App\Controllers\Controlador;
use App\Core\Router;

    $router->get('posts', 'Controlador@tabelaPosts');
    $router->post('criar', 'Controlador@criar');

?>