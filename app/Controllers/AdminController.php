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
        if($verificacao > 0){
            session_start();
            $_SESSION['login'] = $email;
            header('Location: /dashboard');
            echo $senha_cripto;
        }else{        
            unset ($_SESSION['login']);
            header('Location: /login');
        }

        //return require "app/views/site/efetuaLogin.view.php";
        
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: /landingpage');
    }

    public function landingpage(){

        return require "app/views/site/landing.view.php";

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