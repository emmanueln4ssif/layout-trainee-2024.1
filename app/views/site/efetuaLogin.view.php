<?php 

//print_r($_REQUEST) 
if(isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])){
  //acesso permitido
  include_once('config.php');

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  //print_r($email);
  //print_r('<br>');
  //print_r($senha);

}else{
  //acesso negado
  header('Location: login.view.php');
}


?>