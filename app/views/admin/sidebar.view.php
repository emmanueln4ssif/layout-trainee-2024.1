<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Story Stroll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../../../public/css/sidebar.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-item" onclick="window.location.href='posts'">
            <img class="sideimg" src="../../../public/assets/lapis.svg" alt="">
            <p class="sidetxt" id="pub">Publicações</p>
        </div>
        <div class="sidebar-item" onclick="window.location.href='dashboard'">
            <img class="sideimg" src="../../../public/assets/dash.svg" alt="">
            <p id="dash" class="sidetxt">Dashboard</p>
        </div>
        <div class="sidebar-item" onclick="window.location.href='users'">
            <img class="sideimg" src="../../../public/assets/usuarios.svg" alt="">
            <p id="users" class="sidetxt">Usuários</p>
        </div>
        <div class="logout-container"></div>
        <div class="sidebar-item" onclick="window.location.href='/logout'">
            <!-- Div com borda superior branca para separar o botão de logout -->
            <img class="sideimg" src="../../../public/assets/logout.svg" alt="">
            <p id="logout" class="sidetxt">Logout</p>
        </div>
    </div>
    <script src="../../../public/js/sidebar.js"></script>
</body>

</html>