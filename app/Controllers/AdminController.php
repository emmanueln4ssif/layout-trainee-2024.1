<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class AdminController
{

    public function index()
    {
        $page = 1;
        if(isset($_GET['pagina']) && !empty($_GET['pagina'])){
            $page = intval($_GET['pagina']);
            if($page<=0){
                return redirect('/users');
            }
        }
        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App :: get('database')->conta('users');
        if($inicio > $rows_count){
            return redirect('/users');
        }


        $users = App::get('database')->selectAll('users',$inicio,$itensPage);
        $total_pages = ceil ($rows_count/$itensPage);
        return view('admin/lista-usuarios', compact('users', 'page', 'total_pages'));
    }




    public function login(){

        return require "app/views/site/login.view.php";
        
    }
    

    public function dashboard(){

        return require "app/views/admin/dashboard.view.php";
        
    }


    public function efetuaLogin(){

        $email = $_POST['email'];
        $senha_crua = $_POST['senha'];
        $senha_cripto = md5($senha_crua);

        $verificacao = App::get('database')->verificaLogin($email, $senha_cripto);
        //return view('admin/lista-usuarios', compact('users'));
        if($verificacao[0] > 0){
            session_start();
            
            $_SESSION['login'] = $email;
            $_SESSION['id']=$verificacao[1][0]->id;
            $_SESSION['nome']= $verificacao[1][0]->name;
            
            header('Location: /dashboard');
        }else{        
            unset ($_SESSION['login']);
            unset ($_SESSION['id']);
            header('Location: /login');
        }

        //return require "app/views/site/efetuaLogin.view.php";
        
    }
    public function criar()
    {
        $parameters= [
            'livro_titulo' => $_POST['titulo-livro'],
            'livro_autor' => $_POST['autor-livro'],
            'livro_ano' => $_POST['ano-pub'],
            'sinopse'=> $_POST['sinopse'],
            'nota_internet'=> $_POST['nota-net'],
            'user_id'=> $_POST['user-id'],
            'titulo_post'=> $_POST['titulo'],
            'nota_user'=> $_POST['nota-user'],
            'review'=> $_POST['conteudo'],
            'data_leitura'=> $_POST['data'],
            'data_post'=> date("Y-m-d")   
        ];
        App::get('database')->inserir('posts',$parameters, $_FILES['img']);
        header('Location: ../posts');
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: /');
    }

    public function landingpage(){

        return require "app/views/site/landing.view.php";

    }

    public function listaPosts(){
        $users= App::get('database')->selectAll('users') ;
        $pesquisa = true;
        if(!empty($_GET['search'])){
            $pesquisa = $_GET['search'];
            $posts = App::get('database')->selectSearch($pesquisa);
            return view('site/lista-de-posts',compact('posts','users','pesquisa'));
        }else{
            $posts = App::get('database')->selectAllDesc('posts');
            return view('site/lista-de-posts',compact('posts','users','pesquisa'));
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
    public function listaPost ()
    {
        $page = 1;
        if(isset($_GET['pagina']) && !empty($_GET['pagina'])){
            $page = intval($_GET['pagina']);
            if($page<=0){
                return redirect('/publicacoes');
            }
        }
        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App :: get('database')->conta('posts');
        if($inicio > $rows_count){
            return redirect('/publicacoes');
        }
        $posts = App::get('database')->selectAllcomNome('posts',$inicio,$itensPage);
        $total_pages = ceil ($rows_count/$itensPage);
        return view('site/lista-de-posts',compact('posts','page', 'total_pages'));
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