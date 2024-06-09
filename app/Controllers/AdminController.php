<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class AdminController
{

    public function index()
    {
        $users = App::get('database')->selectAll('users');
        return view('admin/lista-usuarios', compact('users'));
    }

    public function listaPosts(){

        if(!empty($_GET['search'])){
            $pesquisa = $_GET['search'];
            $post_pesquisado = App::get('database')->selectSearch($pesquisa);
            return view('site/lista-de-posts',compact('post_pesquisado'));
        }else{
            $post_pesquisado = App::get('database')->selectAllDesc('posts');
            return view('site/lista-de-posts',compact('post_pesquisado'));
        }

    }

    public function edit ()
    {
        $parameters = [
            'password' => md5($_POST ['senha']),
            'name' => $_POST['autor'],
            'email' => $_POST['email']
        ];
        $id = $_POST['id'];

        App::get('database')->edita('users', $parameters, $id);

        header('Location: /users');
        

    }
    public function create(){

        $parameters = [
            'name' => $_POST['nome'],
            'email' => $_POST['email'],
            'password' => md5($_POST['senha'])
        ];

        App::get('database')->insert('users', $parameters);

        header('Location: /users');
        

    }

    public function delete(){

        $id = $_POST['id'];

        App::get('database')->delete('users', $id);

        header('Location: /users');

    }

}

?>