<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/login.css">
    <link rel="icon" type="image/x-icon" href="../../../public/assets/logo_sf.png">
    <title>Story Stroll - Login</title>
</head>

<body>
    <div class="main">

        <div class="esquerda">
            <a id="logo-escrita" onclick="window.location.href='/'">STORY STROLL</a>
            <div class="imagem-principal">
                <img id="imagem-principal" src="/public/assets/imagem-principal.svg" alt="Três pessoas lendo livros">
            </div>
        </div>

        <div class="direita">
            <div class="cabecalho">
                <img id="marcador-de-livro" src="/public/assets/marcador-de-livro.svg" alt="Marcador de livro">
                <img id="logo-imagem" src="/public/assets/logo-direita.svg" alt="Logo Story Stroll" onclick="window.location.href='/'">
            </div>

            <p id="titulo-login">Bem vindo de volta!</p>
            <div class="formulario">
                <form action="efetuaLogin" method="post">

                    <div class="campos">
                        <div class="senha-campo">
                            <div class="circulo" style="position:unset;">
                                <img id="icone-senha" src="/public/assets/icone-e-mail.svg" alt="Ícone de cadeado representando senha">
                            </div>

                            <label for="email"></label>
                            <input id="email" oninput="apagaMsg()" type="email" name="email" placeholder="Digite seu e-mail" required>


                        </div>
                    </div>
                    <div class="campos">
                        <div class="senha-campo">
                            <div class="circulo" style="position:unset;">
                                <img id="icone-senha" src="/public/assets/icone-senha.svg" alt="Ícone de cadeado representando senha">
                            </div>

                            <input id="senha" oninput="apagaMsg()" type="password" name="senha" placeholder="Digite sua senha" required>
                            <div onclick="mostrarSenha()">
                                <img id="icone-olho" src="/public/assets/olho-aberto.svg" alt="Ícone de olho representando a visibilidade da senha">
                            </div>
                        </div>
                    </div>
                    <p id="valida"><?php
                                    function erro()
                                    {
                                        if ($_GET['s'] == 1) {
                                            echo 'Email ou senha inválidos!';
                                        }
                                    }
                                    @erro();
                                    ?></p>
                    <input id="btn-login" type="submit" value="Logar"></input>
                </form>
            </div>
        </div>
    </div>
    <script src="/public/js/login.js"></script>
</body>

</html>