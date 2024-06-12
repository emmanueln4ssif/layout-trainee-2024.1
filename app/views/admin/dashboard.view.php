<?php

session_start();

if(!isset ($_SESSION['login']) == true){
    header('Location: /login');
}

?>


<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap">

    <title>Story Stroll</title>
</head>

<body>
    <div class="corpo">
        <img id="mainimg" src="../../../public/assets/foto.svg">
        <div class="botoes">
            <div class="botao" onclick="window.location.href='posts'">
                <img id="botaopublicacao" src="../../../public/assets/lapis.svg">
                <p>Publicações</p>
            </div>
            <div class="botao" onclick="window.location.href='users'">
                <img id="botaousuarios" src="../../../public/assets/usuarios.svg">
                <p>Usuários</p>
            </div>
            <div class="botao" id="botaolog" onclick="window.location.href='/'">
                <img id="botaologout" src="../../../public/assets/logout.svg">
                <a href="/logout">
                    <p>Logout</p>
                </a>
            </div>

</body>

</html>