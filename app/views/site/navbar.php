<?php

session_start();

?>
<link rel="stylesheet" href="/public/css/NB-e-footer.css">

<header>
    <div class="container">
        <nav class="navbar">
            <div class="nav-container">
                <img id="nav-logo" onclick="location.href='/'" src="/public/assets/LOGO_BRANCA-removebg V1.png"
                    alt="Story Stroll" style="cursor: pointer;">
                <ul>
                    <?php 
                    if(!isset ($_SESSION['login']) == true){
                       echo '<li><a href="/dashboard">Login</a></li>';
                    }else{
                        echo '<li><a href="/dashboard">Dashboard</a></li>';
                    }
                    ?>

                    <li><a href="/publicacoes">Publicações</a></li>
                    <li><a href="/">Home</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>