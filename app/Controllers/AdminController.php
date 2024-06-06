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