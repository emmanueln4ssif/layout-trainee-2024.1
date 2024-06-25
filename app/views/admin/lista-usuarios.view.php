<?php

session_start();

if(!isset ($_SESSION['login']) == true){
    header('Location: /login');
}

?>


<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../public/css/lista-usuarios.css">
    <link rel="icon" type="image/x-icon" href="../../../public/assets/logo_sf.png">

    <title>Admin - Lista de Usuários</title>
</head>

<body>
    <script type="text/javascript" src="../../../public/js/md5.js">
    </script>

    <div class="sdbar">
        <?php include 'sidebar.view.php'?>
    </div>

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

                        <?php $cont_id = 1+(5*($page-1)); ?>
                        <?php foreach ($users as $user): ?>

                        <tr class="linha-normal">
                            <td class="table-id"><?php echo $cont_id ?></td>
                            <td class="nome"><?php echo $user->name ?></td>
                            <td class="email"><?php echo $user -> email ?></td>
                            <td align="center" class="espaco-visualizar"><button class="visualizar"
                                    onclick="abrebotao('modal-visualizar<?php echo $user -> id ?>')"><i
                                        class="bi bi-eye-fill"></i>Visualizar</button></td>
                            <td align="center" class="espaco-editar"><button class="editar" id="abrebotao"
                                    onclick="abrebotao('edicaouser<?php echo $user -> id ?>')"><i
                                        class="bi bi-pencil-square"></i>Editar</button></td>
                            <td align="center" class="espaco-deletar ultimoDado"><button class="deletar"
                                    onclick="abrebotao('excluir<?php echo $user -> id ?>')"><i
                                        class="bi bi-trash3-fill"></i>Deletar</button></td>
                        </tr>

                        <tr class="linha-mobile">
                            <td class="table-id" rowspan="2"><?php echo $cont_id ?></td>
                            <td class="nome"><?php echo $user->name ?></td>
                            <td class="email"><?php echo $user -> email ?></td>
                            <td align="center" class="espaco-visualizar"><button class="visualizar"
                                    onclick="abrebotao('modal-visualizar')"><i
                                        class="bi bi-eye-fill"></i>Visualizar</button></td>
                            <td align="center" class="espaco-editar"><button class="editar" id="abrebotao"
                                    onclick="abrebotao('edicaouser<?php echo $user -> id ?>')"><i
                                        class="bi bi-pencil-square"></i>Editar</button></td>
                            <td align="center" class="espaco-deletar ultimoDado"><button class="deletar"
                                    onclick="abrebotao('excluir')"><i class="bi bi-trash3-fill"></i>Deletar</button>
                            </td>
                        </tr>

                        <tr class="botoes-mobile">
                            <td class="linha-botoes" colspan="2">
                                <div class="container-botoes">
                                    <button type="button" class="botao-visualizar"
                                        onclick="abrebotao('modal-visualizar<?php echo $user -> id ?>')"><i
                                            class="bi bi-eye-fill"></i><br>Visualizar</button>
                                    <button type="button" class="botao-editar"
                                        onclick="abrebotao('edicaouser<?php echo $user -> id ?>')"><i
                                            class="bi bi-pencil-square"></i><br>Editar</button>
                                    <button type="button" class="botao-deletar"
                                        onclick="abrebotao('excluir<?php echo $user -> id ?>')"><i
                                            class="bi bi-trash3-fill"></i><br>Deletar</button>
                                </div>
                            </td>

                        </tr>

                        <div id="modal-visualizar<?php echo $user -> id ?>" class="modal-visualizar">
                            <div class="content-visualizar">
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="formulario">
                                        <div class="campos">

                                            <label for="nome">ID</label><br>
                                            <input type="text" id="id" name="id" value="<?php echo $cont_id ?>"
                                                readonly><br>
                                            <label for="nome">Nome</label><br>
                                            <input type="text" id="nome" name="nome" value="<?php echo $user -> name ?>"
                                                readonly>
                                            <label for="email">E-mail</label><br>
                                            <input type="email" id="email" name="email"
                                                value="<?php echo $user -> email ?>" readonly><br>

                                        </div>
                                    </div>
                                </form>
                                <a class="fecha" href="#"
                                    onclick="fechabotao('modal-visualizar<?php echo $user -> id?>')">&times;</a>
                            </div>
                        </div>


                        <div class="editauser " id="edicaouser<?php echo $user -> id ?>">
                            <div class="content">
                                <form action="edit" method="post" enctype="multipart/form-data">
                                    <div class="formulario">
                                        <div class="campos">
                                            <label for="nome">Nome</label><br>
                                            <input type="text" id="autor" name="autor"
                                                value="<?php echo $user -> name ?>" required><br>
                                            <label for="email">E-mail</label><br>
                                            <input type="email" id="email" name="email"
                                                value="<?php echo $user -> email ?>" required><br>
                                            <label for="senha">Senha</label><br>
                                            <div class="senha-e-olho">
                                                <input type="password" id="senha<?php echo $user -> id ?>" name="senha"
                                                    required>
                                                <div class="olho"
                                                    onclick="mostrarSenha('senha<?php echo $user -> id ?>', 'icone-olhosenha<?php echo $user -> id ?>')">
                                                    <img id="icone-olhosenha<?php echo $user -> id ?>"
                                                        src="../../../public/assets/olho-aberto.svg"
                                                        alt="Ícone de olho representando a visibilidade da senha">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $user -> id ?>">
                                    <input type="submit" value="Salvar">
                                </form>
                                <a class="fecha" href="#"
                                    onclick="fechabotao('edicaouser<?php echo $user -> id ?>')">&times;</a>
                            </div>
                        </div>

                        <div id="excluir<?php echo $user -> id ?>" class="cont-deletar">
                            <div class="content">
                                <a class="fecha" onclick="fechabotao('excluir<?php echo $user -> id ?>')"
                                    href="#">&times;</a>
                                <div class="quebra"></div>
                                <form action="delete" method="post">
                                    <!--<input type="hidden" name="id" value="">-->
                                    <div class="rm-ct">
                                        <p>Deseja excluir o usuário?</p>
                                        <img src="../../../public/assets/Inbox cleanup-rafiki (1).svg">
                                        <div class="botoes-rm">
                                            <input type="hidden" name="id" value="<?php echo $user -> id ?>">
                                            <?php
                                            if($user->id==$_SESSION['id']){
                                                echo '<input type="hidden" name="logout" value="1">';
                                            }
                                            ?>
                                            <input type="submit" value="Excluir usuário">
                                            <button class="cancelar"
                                                onclick="fechabotao('excluir<?php echo $user -> id ?>')"
                                                type="button">Cancelar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <?php $cont_id++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>

            </div>

            <!-- PAGINÇÃO -->

            <div id="alternador" class="paginacao">
                <?php
                if ($page - 1 > 0) {
                    echo "<button class='btn btn-voltar' onclick=\"location.href='?pagina=1';\">Início</button>";
                } else {
                    echo "<button class='btn btn-voltar cs'>Início</button>";
                }
                ?>
                <?php
                if ($page - 1 > 0) {
                    echo "<button class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">&lt; Voltar</button>";
                } else {
                    echo "<button class='btn btn-voltar cs'>&lt; Voltar</button>";
                }
                ?>
                <nav class="navpaginacao">
                    <ul class="paginacao-numeros">


                        <?php if ($page - 1 >= 4): ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>

                        <?php if ($page - 3 >= 1): ?>
                        <li onclick="location.href = '?pagina=<?= $page - 3 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 3 ?>"><?= $page - 3 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page - 2 >= 1): ?>
                        <li onclick="location.href = '?pagina=<?= $page - 2 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 2 ?>"><?= $page - 2 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page - 1 >= 1): ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages): ?>
                        <li onclick="location.href = '?pagina=<?= $page + 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page + 2 <= $total_pages): ?>
                        <li onclick="location.href = '?pagina=<?= $page + 2 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 2 ?>"><?= $page + 2 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page + 3 <= $total_pages): ?>
                        <li onclick="location.href = '?pagina=<?= $page + 3 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 3 ?>"><?= $page + 3 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page < $total_pages - 3 && $page+3 != $total_pages): ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>


                    </ul>
                </nav>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar &gt</button>";
                } else {
                    echo "<button class='btn btn-avancar cs'>Avançar &gt</button>";
                }
                ?>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($total_pages) . "';\">Fim</button>";
                } else {
                    echo "<button class='btn btn-avancar cs'>Fim</button>";
                }
                ?>
            </div>


            <div id="alternador2" class="paginacao">
                <?php
                if ($page - 1 > 0) {
                    echo "<button class='btn btn-voltar' onclick=\"location.href='?pagina=1';\">Início</button>";
                } else {
                    echo "<button class='btn btn-voltar cs'>Início</button>";
                }
                ?>
                <?php
                if ($page - 1 > 0) {
                    echo "<button class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">&lt; Voltar</button>";
                } else {
                    echo "<button class='btn btn-voltar cs'>&lt; Voltar</button>";
                }
                ?>
                <nav class="navpaginacao">
                    <ul class="paginacao-numeros">


                        <?php if ($page - 1 >= 3): ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>



                        <?php if ($page - 2 >= 1): ?>
                        <li onclick="location.href = '?pagina=<?= $page - 2 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 2 ?>"><?= $page - 2 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page - 1 >= 1): ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages): ?>
                        <li onclick="location.href = '?pagina=<?= $page + 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page + 2 <= $total_pages): ?>
                        <li onclick="location.href = '?pagina=<?= $page + 2 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 2 ?>"><?= $page + 2 ?></a></li>
                        <?php endif; ?>



                        <?php if ($page < $total_pages - 2 && $page+2 != $total_pages): ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>


                    </ul>
                </nav>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar &gt</button>";
                } else {
                    echo "<button class='btn btn-avancar cs'>Avançar &gt</button>";
                }
                ?>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($total_pages) . "';\">Fim</button>";
                } else {
                    echo "<button class='btn btn-avancar cs'>Fim</button>";
                }
                ?>
            </div>

            <div id="alternador3" class="paginacao">
                <?php
                if ($page - 1 > 0) {
                    echo "<button class='btn btn-voltar' onclick=\"location.href='?pagina=1';\">Início</button>";
                } else {
                    echo "<button class='btn btn-voltar cs'>Início</button>";
                }
                ?>
                <?php
                if ($page - 1 > 0) {
                    echo "<button class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">&lt; Voltar</button>";
                } else {
                    echo "<button class='btn btn-voltar cs'>&lt; Voltar</button>";
                }
                ?>
                <nav class="navpaginacao">
                    <ul class="paginacao-numeros">


                        <?php if ($page - 1 >= 2): ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>


                        <?php if ($page - 1 >= 1): ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages): ?>
                        <li onclick="location.href = '?pagina=<?= $page + 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                        <?php endif; ?>





                        <?php if ($page < $total_pages - 1 && $page+1 != $total_pages): ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>


                    </ul>
                </nav>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar &gt</button>";
                } else {
                    echo "<button class='btn btn-avancar cs'>Avançar &gt</button>";
                }
                ?>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($total_pages) . "';\">Fim</button>";
                } else {
                    echo "<button class='btn btn-avancar cs'>Fim</button>";
                }
                ?>
            </div>

            <div id="alternador4" class="paginacao">

                <?php
                if ($page - 1 > 0) {
                    echo "<button class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">&lt; Voltar</button>";
                } else {
                    echo "<button class='btn btn-voltar cs'>&lt; Voltar</button>";
                }
                ?>
                <nav class="navpaginacao">
                    <ul class="paginacao-numeros">


                        <?php if ($page - 1 >= 2): ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>


                        <?php if ($page - 1 >= 1): ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages): ?>
                        <li onclick="location.href = '?pagina=<?= $page + 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page < $total_pages - 1 && $page+1 != $total_pages): ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar &gt</button>";
                } else {
                    echo "<button class='btn btn-avancar cs'>Avançar &gt</button>";
                }
                ?>

            </div>

            <div id="alternador5" class="paginacao">

                <?php
                if ($page - 1 > 0) {
                    echo "<button class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">&lt; Voltar</button>";
                } else {
                    echo "<button class='btn btn-voltar cs'>&lt; Voltar</button>";
                }
                ?>
                <nav class="navpaginacao">
                    <ul class="paginacao-numeros">


                        <?php if ($page - 1 >= 1): ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages): ?>
                        <li onclick="location.href = '?pagina=<?= $page + 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                        <?php endif; ?>


                    </ul>
                </nav>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar &gt</button>";
                } else {
                    echo "<button class='btn btn-avancar cs'>Avançar &gt</button>";
                }
                ?>

            </div>
            <div id="alternador6" class="paginacao">

                <?php
                if ($page - 1 > 0) {
                    echo "<button class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">Voltar</button>";
                } else {
                    echo "<button class='btn btn-voltar cs'>Voltar</button>";
                }
                ?>
                <nav class="navpaginacao">
                    <ul class="paginacao-numeros">


                        <?php if ($page - 1 >= 1): ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages): ?>
                        <li onclick="location.href = '?pagina=<?= $page + 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                        <?php endif; ?>


                    </ul>
                </nav>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar</button>";
                } else {
                    echo "<button class='btn btn-avancar cs'>Avançar</button>";
                }
                ?>

            </div>
        </div>

        <div id="adcuser">
            <div class="content">
                <form action="create" onsubmit="return validaForm();" method="post" enctype="multipart/form-data">
                    <div class="formulario">
                        <div class="campos">
                            <label for="nome">Nome</label><br>
                            <input type="text" id="autor" name="nome" placeholder="Digite o nome do usuário"
                                required><br>
                            <label for="email">E-mail</label><br>
                            <p id="valida"></p>
                            <input type="email" id="email-test" oninput="validaEmail()" name="email"
                                placeholder="Digite o e-mail do usuário" required><br>
                            <label for="senha">Senha</label><br>
                            <div class="senha-e-olho">
                                <input type="password" id="senha1" name="senha" required>
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

    </main>
</body>
<script>
const emailsMD5 = <?= json_encode($email); ?>;
</script>
<script src="../../../public/js/lista-usuarios.js">

</script>

</html>