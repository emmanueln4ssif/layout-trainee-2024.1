<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class Controlador
{

    public function tabelaPosts()
    {
        $posts = App::get('database')->selectAll('posts');

        

        return view('admin/admin-lista-de-posts',$posts);
    }
}

?>