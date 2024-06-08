<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/login.css">
  <title>Login - Story Stroll</title>
</head>

<body>

  <div class="main">

    <div class="esquerda">
      <a id="logo-escrita" href="">STORY STROLL</a>
      <div class="imagem-principal">
        <img id="imagem-principal" src="/public/assets/imagem-principal.svg" alt="Três pessoas lendo livros">
      </div>
    </div>

    <div class="direita">
      <div class="cabecalho">
        <img id="marcador-de-livro" src="/public/assets/marcador-de-livro.svg" alt="Marcador de livro">
        <img id="logo-imagem" src="/public/assets/logo-direita.svg" alt="Logo Story Stroll">
      </div>

      <p id="titulo-login">Bem vindo de volta!</p>

      <form action="efetuaLogin" method="post">
        <div class="campos">
          <div class="circulo">
            <img id="icone-email" src="/public/assets/icone-e-mail.svg"
            alt="Ícone de carta representando e-mail">
          </div>
          <label for="email"></label>
          <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
        </div>

        <div class="campos">
          <div class="circulo">
            <img id="icone-senha" src="/public/assets/icone-senha.svg"
            alt="Ícone de cadeado representando senha">
          </div>
          <label for="senha"></label>
          <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
          <div class="olho" onclick="mostrarSenha()">
            <img id="icone-olho" src="/public/assets/olho-aberto.svg"
            alt="Ícone de olho representando a visibilidade da senha">
          </div>
        </div>
        <input id="btn-login" type="submit"></input>
      </form>
    </div>
  </div>
  <script src="/public/js/login.js"></script>
</body>

</html>