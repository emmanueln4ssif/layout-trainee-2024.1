<?php

session_start();

if (!isset($_SESSION['login']) == true) {
    header('Location: /login');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Lista de Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/css/admin-lista-de-posts.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="../../../public/assets/logo_sf.png">

</head>

<body>

    <div class="sdbar">
        <?php include 'sidebar.view.php' ?>
    </div>

    <main>

        <div class="tabelaPost">
            <div class="cabecalho">
                <button type="button" class="botoes-fora-tabela" id="botao-criar-post"
                    onclick="abrirModal('adiciona-post')"><i class="bi bi-plus-lg"></i> Criar post</button>
                <p id="titulo-pg">Lista de posts</p>

            </div>

            <div class="container-tabela">
                <table class="tabela-posts">
                    <thead>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Data</th>
                        <th class="acoes"></th>
                        <th class="acoes"></th>
                        <th class="acoes"></th>
                    </thead>
                    <tbody>
                        <?php $cont_id = 1 + (5 * ($page - 1)); ?>


                        <?php foreach ($posts as $post) :
                            $comp = explode('-', $post->data_post);
                            $datapostFormatada = $comp[2] . '/' . $comp[1] . '/' . $comp[0];

                            $compLeitura = explode('-', $post->data_leitura);
                            $dataleituraFormatada = $compLeitura[2] . '/' . $compLeitura[1] . '/' . $compLeitura[0];
                        ?>
                        <tr class="linha-normal">
                            <td class="espaco-id"><?php echo $cont_id ?></td>
                            <td class="espaco-titulo"><?php echo $post->titulo_post ?></td>
                            <td class="espaco-autor"><?php echo $post->name ?></td>
                            <td class="espaco-data"><?php echo $datapostFormatada  ?></td>
                            <td class="espaco-visualizar"><button type="button" class="botao-visualizar"
                                    onclick="abrirModal('visualizar<?php echo $post->id ?>')"><i
                                        class="bi bi-eye-fill"></i><br>Visualizar</button>
                            </td>
                            <td class="espaco-editar"><button type="button" class="botao-editar"
                                    onclick="abrirModal('edit-post<?php echo $post->id ?>')"><i
                                        class="bi bi-pencil-square"></i><br>Editar</button>
                            </td>
                            <td class="espaco-excluir"><button type="button" class="botao-excluir"
                                    onclick="abrirModal('rm-post<?php echo $post->id ?>')"><i
                                        class="bi bi-trash3-fill"></i><br>Deletar</button>
                            </td>
                        </tr>
                        <tr class="linha-mobile">
                            <td class="espaco-id" rowspan="2"><?php echo $cont_id ?></td>
                            <td class="espaco-titulo"><?php echo $post->titulo_post ?></td>
                            <td class="espaco-autor"><?php echo $post->name ?></td>
                            <td class="espaco-data" rowspan="2"><?php echo $datapostFormatada ?></td>
                            <td class="espaco-visualizar"><button type="button" class="botao-visualizar"
                                    onclick="abrirModal('visualizar<?php echo $post->id ?>')"><i
                                        class="bi bi-eye-fill"></i><br>Visualizar</button>
                            </td>
                            <td class="espaco-editar"><button type="button" class="botao-editar"
                                    onclick="abrirModal('edit-post<?php echo $post->id ?>')"><i
                                        class="bi bi-pencil-square"></i><br>Editar</button>
                            </td>
                            <td class="espaco-excluir"><button type="button" class="botao-excluir"
                                    onclick="abrirModal('rm-post<?php echo $post->id ?>')"><i
                                        class="bi bi-trash3-fill"></i><br>Deletar</button>
                            </td>
                        </tr>
                        <tr class="botoes-mobile">
                            <td class="linha-botoes" colspan="2">
                                <div class="container-botoes">
                                    <button type="button" class="botao-visualizar"
                                        onclick="abrirModal('visualizar<?php echo $post->id ?>')"><i
                                            class="bi bi-eye-fill"></i><br>Visualizar</button>
                                    <button type="button" class="botao-editar"
                                        onclick="abrirModal('edit-post<?php echo $post->id ?>')"><i
                                            class="bi bi-pencil-square"></i><br>Editar</button>
                                    <button type="button" class="botao-excluir"
                                        onclick="abrirModal('rm-post<?php echo $post->id ?>')"><i
                                            class="bi bi-trash3-fill"></i><br>Deletar</button>
                                </div>
                            </td>
                        </tr>

                        <!-- MODAL DE VISUALIZAÇÃO - INÍCIO -->
                        <div class="cont-modal" id="visualizar<?php echo $post->id ?>">
                            <div class="content">
                                <div class="content-vizu">
                                    <div class="cima">
                                        <div class="direita">
                                            <h3>Título do livro</h3>
                                            <p><?php echo $post->livro_titulo ?></p>
                                            <h3>Autor do livro</h3>
                                            <p><?php echo $post->livro_autor ?></p>
                                            <h3>Ano de publicação</h3>
                                            <p><?php echo $post->livro_ano ?></p>
                                        </div>
                                        <div class="esquerda">
                                            <h3>Sinopse</h3>
                                            <textarea readonly><?php echo $post->sinopse ?></textarea>
                                            <br>
                                            <div class="nota">
                                                <h3>Nota média da internet</h3>
                                                <?php viewEstrela($post->id . "1", 30, $post->nota_internet) ?>
                                            </div>

                                        </div>

                                    </div>
                                    <hr>
                                    <div class="baixo">
                                        <div class="esquerda">
                                            <h3>Autor</h1>
                                                <p><?php echo $post->name ?></p>
                                                <h3>Título</h1>
                                                    <p><?php echo $post->titulo_post ?></p>
                                                    <div id="nota-usuario" class="nota">
                                                        <h3>Nota do usuário</h3>
                                                        <?php viewEstrela($post->id . "2", 30, $post->nota_user) ?>
                                                    </div>
                                                    <h3>Review</h1>
                                                        <textarea rows="14" cols="50"
                                                            readonly><?php echo $post->review ?></textarea>
                                        </div>
                                        <div class="direita">
                                            <img src="<?php echo $post->imagem ?>">
                                            <h3>Data da leitura</h3>
                                            <p><?php echo $dataleituraFormatada ?></p>
                                            <h3>Data da publicação</h3>
                                            <p><?php echo $datapostFormatada ?></p>
                                        </div>
                                    </div>
                                </div>
                                <button class="fecha"
                                    onclick="fecharModal('visualizar<?php echo $post->id ?>')">&times;</button>
                            </div>
                        </div>

                        <!-- MODAL DE DELETAR - INICIO -->
                        <div id="rm-post<?php echo $post->id ?>" class="cont-modal">
                            <div class="content-delete">
                                <a class="fecha" onclick="fecharModal('rm-post<?php echo $post->id ?>')"
                                    href="#">&times;</a>

                                <form action="post/deletar" method="POST">
                                    <input type="hidden" value="<?= $post->imagem ?>" name="imagem-apagar">
                                    <input type="hidden" value="<?= $post->id ?>" name="id">
                                    <div class="rm-ct">
                                        <p>Deseja excluir a publicação?</p>
                                        <img src="../../../public/assets/Inbox cleanup-rafiki (1).svg">
                                        <div class="botoes-rm">
                                            <input type="submit" value="Excluir publicação">
                                            <button class="cancelar"
                                                onclick="fecharModal('rm-post<?php echo $post->id ?>')"
                                                type="button">Cancelar</button>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- MODAL DE DELETAR - FIM -->

                        <!-- MODAL DE EDITAR - INICIO -->

                        <div class="cont-modal" id="edit-post<?php echo $post->id ?>">

                            <div class="content modal-editar-tam">

                                <form class="form-editar" action="post/editar" method="post"
                                    enctype="multipart/form-data">
                                    <div class="livro">
                                        <div class="direita">
                                            <label for="titulo-livro">Título do livro</label>
                                            <input type="text" id="titulo-livro" name="titulo-livro"
                                                placeholder="Título do livro" value="<?php echo $post->livro_titulo ?>"
                                                required>
                                            <label for="autor-livro">Nome do autor</label>
                                            <input type="text" id="autor-livro" name="autor-livro"
                                                placeholder="Nome do autor do livro"
                                                value="<?php echo $post->livro_autor ?>" required>
                                            <label for="ano-pub">Ano de publicação</label>
                                            <input name="ano-pub" id="ano-pub" type="number"
                                                placeholder="Ano de publicação" max="2024"
                                                value="<?php echo $post->livro_ano ?>" required>
                                        </div>
                                        <div class="esquerda">
                                            <label for="sinopse">Sinopse</label><br>
                                            <textarea name="sinopse" rows="7" cols="50" id="sinopse"
                                                required><?php echo $post->sinopse ?></textarea>
                                            <br>
                                            <label>Nota média da internet</label><br>
                                            <div class="rating">
                                                <input name="nota-net" id="nota" type="text"
                                                    value="<?= $post->nota_internet ?>"
                                                    oninput="controlaCampoNota(this)" required>
                                            </div><br>
                                        </div>
                                    </div>
                                    <hr>


                                    <div class="formulario">

                                        <div class="esquerda">
                                            <label for="autor">Autor</label><br>
                                            <input type="text" id="autor" name="autor"
                                                value="<?php echo $post->name ?> " readonly><br>
                                            <label for="titulo">Título</label><br>
                                            <input type="text" id="titulo" name="titulo"
                                                placeholder="Título da sua review"
                                                value="<?php echo $post->titulo_post ?>" required>
                                            <label>Sua nota</label><br>
                                            <div class="rating">
                                                <input name="nota-user" id="nota" type="text"
                                                    value="<?= $post->nota_user ?>" oninput="controlaCampoNota(this)"
                                                    required>
                                            </div>
                                            <br>
                                            <label for="conteudo">Review</label><br>
                                            <textarea type="text" id="conteudo" name="conteudo"
                                                placeholder="Conteudo da sua review" rows="7" cols="50"
                                                required><?php echo $post->review ?></textarea>
                                        </div>

                                        <div class="direita">
                                            <div class="img-prev"><img class="preview2" id="preview<?= $post->id ?>"
                                                    src="<?php echo $post->imagem ?>" alt="Pré-visualização da imagem">
                                            </div>
                                            <label for="img">Selecione uma imagem:</label>
                                            <input type="file" id="img-edita<?= $post->id ?>" name="img"
                                                accept="image/*">
                                            <label for="data">Data da leitura:</label>
                                            <input type="date" id="prev-data" value="<?php echo $post->data_leitura ?>"
                                                name="data" required>
                                        </div>

                                    </div>
                                    <input type="hidden" value="<?php echo $post->id ?>" name="id">
                                    <input type="submit" value="Salvar">

                                </form>

                                <button class="fecha"
                                    onclick="fecharModal('edit-post<?php echo $post->id ?>')">&times;</button>

                            </div>

                        </div>
                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('img-edita<?= $post->id ?>').addEventListener('change',
                                function(e) {
                                    var reader = new FileReader();
                                    reader.onload = function(event) {
                                        document.getElementById('preview<?= $post->id ?>').src = event
                                            .target.result;
                                        document.getElementById('preview<?= $post->id ?>').style
                                            .display =
                                            'block';
                                    };
                                    reader.readAsDataURL(e.target.files[0]);
                                });
                        });
                        </script>
                        <?php $cont_id++; ?>
                        <?php endforeach; ?>

                        <!-- MODAL DE VISUALIZAÇÃO - FIM -->

                    </tbody>
                </table>
                <!-- MODAL DE CRIAÇÃO - INÍCIO -->

                <div id="adiciona-post" class="cont-modal">
                    <div class="content">

                        <form action="post/criar" method="post" enctype="multipart/form-data">
                            <div class="livro">
                                <div class="direita">
                                    <label for="titulo-livro">Título do livro</label>
                                    <input type="text" id="titulo-livro" name="titulo-livro"
                                        placeholder="Título do livro" required>
                                    <label for="autor-livro">Nome do autor</label>
                                    <input type="text" id="autor-livro" name="autor-livro"
                                        placeholder="Nome do autor do livro" required>
                                    <label for="ano-pub">Ano de publicação</label>
                                    <input name="ano-pub" id="ano-pub" type="number" placeholder="Ano de publicação"
                                        max="2024" required>
                                </div>
                                <div class="esquerda">
                                    <label for="sinopse">Sinopse</label><br>
                                    <textarea name="sinopse" rows="7" cols="50" id="sinopse" required></textarea>
                                    <br>
                                    <div class="rating">
                                        <label>Nota média da internet</label><br>
                                        <input name="nota-net" id="nota" type="text"
                                            placeholder="Digite um número entre 0 e 5.0"
                                            oninput="controlaCampoNota(this)" required>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <hr>
                            <div class="formulario">
                                <div class="esquerda">
                                    <label for="autor">Autor</label><br>
                                    <input type="text" id="autor" name="autor" value="<?= $_SESSION['nome'] ?>"
                                        readonly><br>
                                    <input type="hidden" name="user-id" value="<?= $_SESSION['id'] ?>">
                                    <label for="titulo">Título</label><br>
                                    <input type="text" id="titulo" name="titulo" placeholder="Título da sua review"
                                        required><br>
                                    <label>Sua nota</label><br>
                                    <div class="rating">
                                        <input name="nota-user" id="nota" type="text"
                                            placeholder="Digite um número entre 0 e 5.0"
                                            oninput="controlaCampoNota(this)" required>
                                    </div>
                                    <br>
                                    <label for="conteudo">Review</label><br>
                                    <textarea type="text" id="conteudo" name="conteudo"
                                        placeholder="Conteudo da sua review" rows="7" cols="50" required></textarea>
                                </div>
                                <div class="direita">
                                    <div class="img-prev"><img id="preview" src="#" alt="Pré-visualização da imagem"
                                            style="display: none;">
                                    </div>
                                    <label for="img">Selecione uma imagem:</label>
                                    <input type="file" id="img-adc" name="img" accept="image/*" required>
                                    <script>
                                    document.getElementById("img-adc").required;
                                    </script>
                                    <label for="data">Data da leitura:</label>
                                    <input type="date" id="data-adc" name="data" required>
                                    <input type="date" style="display: none;" id="dataat" name="dataat">
                                </div>
                            </div>
                            <input type="submit" value="Publicar">
                        </form>
                        <a class="fecha" href="#" onclick="fecharModal('adiciona-post')">&times;</a>
                    </div>
                </div>

                <!-- MODAL DE CRIAÇÃO - INÍCIO -->

            </div>
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


                        <?php if ($page - 1 >= 4) : ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>

                        <?php if ($page - 3 >= 1) : ?>
                        <li onclick="location.href = '?pagina=<?= $page - 3 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 3 ?>"><?= $page - 3 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page - 2 >= 1) : ?>
                        <li onclick="location.href = '?pagina=<?= $page - 2 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 2 ?>"><?= $page - 2 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page - 1 >= 1) : ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages) : ?>
                        <li onclick="location.href = '?pagina=<?= $page + 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page + 2 <= $total_pages) : ?>
                        <li onclick="location.href = '?pagina=<?= $page + 2 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 2 ?>"><?= $page + 2 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page + 3 <= $total_pages) : ?>
                        <li onclick="location.href = '?pagina=<?= $page + 3 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 3 ?>"><?= $page + 3 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page < $total_pages - 3 && $page + 3 != $total_pages) : ?>
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


                        <?php if ($page - 1 >= 3) : ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>



                        <?php if ($page - 2 >= 1) : ?>
                        <li onclick="location.href = '?pagina=<?= $page - 2 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 2 ?>"><?= $page - 2 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page - 1 >= 1) : ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages) : ?>
                        <li onclick="location.href = '?pagina=<?= $page + 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page + 2 <= $total_pages) : ?>
                        <li onclick="location.href = '?pagina=<?= $page + 2 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 2 ?>"><?= $page + 2 ?></a></li>
                        <?php endif; ?>



                        <?php if ($page < $total_pages - 2 && $page + 2 != $total_pages) : ?>
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


                        <?php if ($page - 1 >= 2) : ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>


                        <?php if ($page - 1 >= 1) : ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages) : ?>
                        <li onclick="location.href = '?pagina=<?= $page + 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                        <?php endif; ?>





                        <?php if ($page < $total_pages - 1 && $page + 1 != $total_pages) : ?>
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


                        <?php if ($page - 1 >= 2) : ?>
                        <li class="paginacao-item"><a class="paginacao-link">...</a></li>
                        <?php endif; ?>


                        <?php if ($page - 1 >= 1) : ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages) : ?>
                        <li onclick="location.href = '?pagina=<?= $page + 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page + 1 ?>"><?= $page + 1 ?></a></li>
                        <?php endif; ?>

                        <?php if ($page < $total_pages - 1 && $page + 1 != $total_pages) : ?>
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


                        <?php if ($page - 1 >= 1) : ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages) : ?>
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


                        <?php if ($page - 1 >= 1) : ?>
                        <li onclick="location.href = '?pagina=<?= $page - 1 ?>';" class="paginacao-item"><a
                                class="paginacao-link" href="?pagina=<?= $page - 1 ?>"><?= $page - 1 ?></a></li>
                        <?php endif; ?>

                        <li class="paginacao-item"><a style="color: #f5f5f5; text-decoration: none;"
                                class="paginacao-link active"><?= $page ?></a></li>

                        <?php if ($page + 1 <= $total_pages) : ?>
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

    </main>

</body>
<script src="../../../public/js/admin-lista-de-posts.js"></script>

</html>