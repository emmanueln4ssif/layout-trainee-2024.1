<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../../../public/css/lista-usuarios.css">
  <title>Story Stroll</title>
</head>

<body>
  <main>

    <div id="crud-usuario">

      <div id="cabecalho">

        <div id="adicionar">
          <button class="btn" onclick="abrebotao('adcuser')">+ Adicionar usuário</button>
        </div>

        <div id="titulo-table">
          <p>Lista de Usuários</p>
        </div>

      </div>

      <div id="container-table">
        <table>

          <thead>
            <tr class="linha cabecalho">
              <th>ID</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th class="acoes"></th>
              <th class="acoes"></th>
              <th class="acoes"></th>
            </tr>
          </thead>

          <tbody>
            <!--<tr class="linha dado">
              <td class="table-id">01</td>
              <td class="nome">Jorge Renan Drumond</td>
              <td class="email">jorgerenandrumond@storystroll.com</td>
              <td align="center" class="container-btn"><button class="visualizar"
                  onclick="abrebotao('modal-visualizar')"><i class="bi bi-eye-fill"></i>Visualizar</button></td>
              <td align="center" class="container-btn"><button class="editar" id="abrebotao"
                  onclick="abrebotao('edicaouser')"><i class="bi bi-pencil-square"></i>Editar</button></td>
              <td align="center" class="ultimoDado container-btn"><button class="deletar"><i
                    class="bi bi-trash3-fill"></i>Deletar</button></td>
            </tr>-->

            <!-- LINHA 1 - INÍCIO -->
            <?php
              foreach ($users as $user):
                
            ?>
            <tr class="linha-normal">
              <td class="table-id"><?php echo $user->id?></td>
              <td class="nome"><?php echo $user->name ?></td>
              <td class="email"><?php echo $user -> email ?></td>
              <td align="center" class="espaco-visualizar"><button class="visualizar"
                  onclick="abrebotao('modal-visualizar<?php echo $user -> id ?>')"><i class="bi bi-eye-fill"></i>Visualizar</button></td>
              <td align="center" class="espaco-editar"><button class="editar" id="abrebotao"
                  onclick="abrebotao('edicaouser<?php echo $user -> id ?>')"><i class="bi bi-pencil-square"></i>Editar</button></td>
              <td align="center" class="espaco-deletar ultimoDado"><button class="deletar"
                  onclick="abrebotao('excluir')"><i class="bi bi-trash3-fill"></i>Deletar</button></td>
            </tr>

            <tr class="linha-mobile">
              <td class="table-id" rowspan="2">01</td>
              <td class="nome"><?php echo $user->name ?></td>
              <td class="email"><?php $user -> email ?></td>
              <td align="center" class="espaco-visualizar"><button class="visualizar"
                  onclick="abrebotao('modal-visualizar')"><i class="bi bi-eye-fill"></i>Visualizar</button></td>
              <td align="center" class="espaco-editar"><button class="editar" id="abrebotao"
                  onclick="abrebotao('edicaouser<?php echo $user -> id ?>')"><i class="bi bi-pencil-square"></i>Editar</button></td>
              <td align="center" class="espaco-deletar ultimoDado"><button class="deletar"
                  onclick="abrebotao('excluir')"><i class="bi bi-trash3-fill"></i>Deletar</button></td>
            </tr>

            <tr class="botoes-mobile">
              <td class="linha-botoes" colspan="2">
                <div class="container-botoes">
                  <button type="button" class="botao-visualizar" onclick="abrebotao('modal-visualizar<?php echo $user -> id ?>')"><i
                      class="bi bi-eye-fill"></i><br>Visualizar</button>
                  <button type="button" class="botao-editar" onclick="abrebotao('edicaouser<?php echo $user -> id ?>')"><i
                      class="bi bi-pencil-square"></i><br>Editar</button>
                  <button type="button" class="botao-deletar" onclick="abrebotao('excluir')"><i
                      class="bi bi-trash3-fill"></i><br>Deletar</button>
                </div>
              </td>

            </tr>
            <div id="modal-visualizar<?php echo $user -> id ?>"
            class="modal-visualizar">
      <div class="content-visualizar">
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="formulario">
            <div class="campos">
              <label for="nome">ID</label><br>
              
              <input type="text" id="id" name="id" value="<?php echo $user -> id?>" readonly><br>
              <label for="nome">Nome</label><br>
              <input type="text" id="nome" name="nome" value="<?php echo $user -> name ?>" readonly>
              <label for="email">E-mail</label><br>
              <input type="email" id="email" name="email" value="<?php echo $user -> email ?>" readonly><br>
            </div>
          </div>
        </form>
        <a class="fecha" href="#" onclick="fechabotao('modal-visualizar<?php echo $user -> id?>')">&times;</a>
      </div>
    </div>


    <div class = "editauser "id="edicaouser<?php echo $user -> id ?>">
      <div class="content">
        <form action="edit" method="post" enctype="multipart/form-data">
          <div class="formulario">
            <div class="campos">
              <label for="nome">Nome</label><br>
              <input type="text" id="autor" name="autor" value="<?php echo $user -> name ?>"><br>
              <label for="email">E-mail</label><br>
              <input type="email" id="email" name="email" value="<?php echo $user -> email ?>"><br>
              <label for="senha">Senha</label><br>
              <div class="senha-e-olho">
                <input type="password" id="senha" name="senha" value="<?php echo $user -> password ?>">
                <div class="olho" onclick="mostrarSenha()">
                  <img id="icone-olho" src="../../../public/assets/olho-aberto.svg"
                    alt="Ícone de olho representando a visibilidade da senha">
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name = "id" value = "<?php echo $user -> id ?>">
          <input type="submit" value="Salvar">
        </form>
        <a class="fecha" href="#" onclick="fechabotao('edicaouser<?php echo $user -> id ?>')">&times;</a>
      </div>
    </div>

    
            <?php endforeach; ?>
          </tbody>

        </table>

      </div>

      <div id="alternador">
        <button class="btn btn-voltar">&lt Voltar</button>
        <button class="btn btn-avancar">Avançar &gt</button>
      </div>

    </div>

  

    <div id="adcuser">
      <div class="content">
        <form action="create" method="post" enctype="multipart/form-data">
          <div class="formulario">
            <div class="campos">
              <label for="nome">Nome</label><br>
              <input type="text" id="autor" name="nome" placeholder="Digite o nome do usuário"><br>
              <label for="email">E-mail</label><br>
              <input type="email" id="email" name="email" placeholder="Digite o e-mail do usuário"><br>
              <label for="senha">Senha</label><br>
              <div class="senha-e-olho">
                <input type="password" id="senha1" name="senha" placeholder="Digite a senha do usuário">
                <div class="olho" onclick="mostrarSenhaAdc()">
                  <img id="icone-olho1" src="/public/assets/olho-aberto.svg"
                    alt="Ícone de olho representando a visibilidade da senha">
                </div>
              </div>
            </div>
          </div>
          <input type="submit" value="Criar">
        </form>
        <a class="fecha" href="#" onclick="fechabotao('adcuser')">&times;</a>
      </div>
    </div>

 

    <div id="excluir" class="cont-deletar">
      <div class="content">
        <a class="fecha" onclick="fechabotao('excluir')" href="#">&times;</a>
        <div class="quebra"></div>
        <form action="delete" method="post">
          <input type="hidden" name="id" value="id">
          <div class="rm-ct">
            <p>Deseja excluir o usuário?</p>
            <img src="../../../public/assets/Inbox cleanup-rafiki (1).svg">
            <div class="botoes-rm">
              <input type="submit" value="Excluir usuário">
              <button class="cancelar" onclick="fechabotao('excluir')" type="button">Cancelar</button>

            </div>

          </div>
        </form>
      </div>
    </div>


  </main>
</body>
<script src="../../../public/js/lista-usuarios.js"></script>

</html>