<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class Controlador
{

    public function tabelaPosts()
    {
        $page = 1;
        if(isset($_GET['pagina']) && !empty($_GET['pagina'])){
            $page = intval($_GET['pagina']);
            if($page<=0){
                return redirect('/posts');
            }
        }
        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App :: get('database')->conta('posts');
        if($inicio > $rows_count){
            return redirect('/posts');
        }
        $posts = App::get('database')->selectAllcomNome('posts',$inicio,$itensPage);
        $total_pages = ceil ($rows_count/$itensPage);
        return view('admin/admin-lista-de-posts',compact('posts','page', 'total_pages'));
    }

    public function tabelaPostsUser()
    {
        $page = 1;
        if(isset($_GET['pagina']) && !empty($_GET['pagina'])){
            $page = intval($_GET['pagina']);
            if($page<=0){
                return redirect('/posts');
            }
        }
        $itensPage = 5;
        $inicio = $itensPage * $page - $itensPage;
        $rows_count = App :: get('database')->conta('posts');
        if($inicio > $rows_count){
            return redirect('/posts');
        }
        $posts = App::get('database')->selectAllcomNome('posts',$inicio,$itensPage);
        $total_pages = ceil ($rows_count/$itensPage);
        return view('site/lista-de-posts',compact('posts','page', 'total_pages'));
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
  
    public function verPost(){
        $post = App::get('database')->pegaPost('posts',$_GET['id']);
        if($post==null){
        header('Location: /publicacoes');
        exit();
        }
        return view('site/post-individual',compact('post'));
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
    public function landingPage()
    {
        $posts = App::get('database')->selectAllcomNome('posts');
        return view('site/landing',compact('posts'));
    }
    
}


?>