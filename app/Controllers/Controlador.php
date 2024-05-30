<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class Controlador
{

    public function tabelaPosts()
    {
        $posts = App::get('database')->selectAll('posts');

        $aux_usuario = App::get('database')->nomeUsuario('');
        return view('admin/admin-lista-de-posts',$posts);
    }
}

?>