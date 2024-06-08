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
            'data_post'=> date("Y-m-d")   
        ];
        App::get('database')->inserir('posts',$parameters, $_FILES['img']);
        header('Location: ../posts');
    }

    public function editar()
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
            'data_leitura'=> $_POST['data']
        ];

        $id = $_POST["id"];

        App::get('database')->editar("posts", $id, $parameters, $_FILES['img']);

        header('Location: ../posts');
    }

    public function deletar()
    {
        $id = $_POST['id'];
        App::get("database")->deletar("posts", $id);
        header("Location: ../posts");
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }
    
}


?>