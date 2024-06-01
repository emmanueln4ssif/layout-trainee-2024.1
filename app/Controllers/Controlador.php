<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class Controlador
{

    public function tabelaPosts()
    {
        $posts = App::get('database')->selectAllcomNome('posts');
        return view('admin/admin-lista-de-posts',compact('posts'));
    }
    public function criar()
    {
        $parameters= [
            'livro_titulo' => $_POST['titulo-livro'],
            'livro_autor' => $_POST['autor-livro'],
            'livro_ano' => $_POST['ano-pub'],
            'sinopse'=> $_POST['sinopse'],
            'nota_internet'=> $_POST['nota-net'],
            'user_id'=> '1',
            'titulo_post'=> $_POST['titulo'],
            'nota_user'=> $_POST['nota-user'],
            'review'=> $_POST['conteudo'],
            'data_leitura'=> $_POST['data'],
            'data_post'=> $_POST['dataat']   
        ];
        App::get('database')->inserir('posts',$parameters, $_FILES['img']);
        //header('Location: ../posts');
    }
}


?>