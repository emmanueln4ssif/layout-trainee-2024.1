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
</head>

<body>
    <main>
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
                    <?php foreach ($posts as $post) : ?>
                    <tr class="linha-normal">
                        <td class="espaco-id"><?php echo $post->id ?></td>
                        <td class="espaco-titulo"><?php echo $post->titulo_post ?></td>
                        <td class="espaco-autor"><?php echo $post->name ?></td>
                        <td class="espaco-data"><?php echo $post->data_post ?></td>
                        <td class="espaco-visualizar"><button type="button" class="botao-visualizar"
                                onclick="abrirModal('visualizar<?php echo $post->id ?>')"><i
                                    class="bi bi-eye-fill"></i><br>Visualizar</button>
                        </td>
                        <td class="espaco-editar"><button type="button" class="botao-editar"
                                onclick="abrirModal('edit-post<?php $post->id ?>')"><i
                                    class="bi bi-pencil-square"></i><br>Editar</button>
                        </td>
                        <td class="espaco-excluir"><button type="button" class="botao-excluir"
                                onclick="abrirModal('rm-post<?php echo $post->id ?>')"><i
                                    class="bi bi-trash3-fill"></i><br>Deletar</button>
                        </td>
                    </tr>
                    <tr class="linha-mobile">
                        <td class="espaco-id" rowspan="2"><?php echo $post->id ?></td>
                        <td class="espaco-titulo"><?php echo $post->titulo_post ?></td>
                        <td class="espaco-autor"><?php echo $post->name ?></td>
                        <td class="espaco-data" rowspan="2"><?php echo $post->data_post ?></td>
                        <td class="espaco-visualizar"><button type="button" class="botao-visualizar"
                                onclick="abrirModal('visualizar<?php echo $post->id ?>')"><i
                                    class="bi bi-eye-fill"></i><br>Visualizar</button>
                        </td>
                        <td class="espaco-editar"><button type="button" class="botao-editar"
                                onclick="abrirModal('edit-post<?php $post->id ?>')"><i
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
                                    onclick="abrirModal('edit-post<?php $post->id ?>')"><i
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
                                        <h3>Nota média da internet</h3>
                                        <div class="nota">
                                            <?php
                                                $aux = $post->nota_internet;
                                                for ($i = 0; $i < 5; $i++) {
                                                    if ($aux > 0) {
                                                        echo '<span class="icon">★</span>';
                                                        $aux--;
                                                    } else {
                                                        echo '<span class="icon-cinza" style="color: #D9D9D9;">★</span>';
                                                    }
                                                }
                                                ?>
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
                                                <div class="nota">
                                                    <?php
                                                        $aux = $post->nota_user;
                                                        for ($i = 0; $i < 5; $i++) {
                                                            if ($aux > 0) {
                                                                echo '<span class="icon">★</span>';
                                                                $aux--;
                                                            } else {
                                                                echo '<span class="icon-cinza" style="color: #D9D9D9;">★</span>';
                                                            }
                                                        }
                                                        ?>
                                                </div>
                                                <h3>Review</h1>
                                                    <textarea rows="14" cols="50"
                                                        readonly><?php echo $post->review ?></textarea>
                                    </div>
                                    <div class="direita">
                                        <img src="<?php echo $post->imagem ?>">
                                        <h3>Data da leitura</h3>
                                        <p><?php echo $post->data_leitura ?></p>
                                        <h3>Data da publicação</h3>
                                        <p><?php echo $post->data_post ?></p>
                                    </div>
                                </div>
                            </div>
                            <button class="fecha"
                                onclick="fecharModal('visualizar<?php echo $post->id ?>')">&times;</button>
                        </div>
                    </div>

                    <!-- MODAL DE DELETAR - INICIO -->
                    <div id="rm-post<?php echo $post->id ?>" class="cont-modal">
                        <div class="content">
                            <a class="fecha" onclick="fecharModal('rm-post<?php echo $post->id ?>')"
                                href="#">&times;</a>
                            <div class="quebra"></div>
                            <form action="post/deletar" method="POST">
                                <input type="hidden" value="<?php echo $post->id ?>" name="id">
                                <div class="rm-ct">
                                    <p>Deseja excluir a publicação?</p>
                                    <img src="../../../public/assets/Inbox cleanup-rafiki (1).svg">
                                    <div class="botoes-rm">
                                        <input type="submit" value="Excluir publicação">
                                        <button class="cancelar" onclick="fecharModal('rm-post<?php echo $post->id ?>')"
                                            type="button">Cancelar</button>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- MODAL DE DELETAR - FIM -->

                    <!-- MODAL DE EDITAR - INICIO -->

                    <div class="cont-modal" id="edit-post<?php $post->id ?>">

                        <div class="content modal-editar-tam">

                            <form class="form-editar" action="post/editar" method="post" enctype="multipart/form-data">
                                <div class="livro">
                                    <div class="direita">
                                        <label for="titulo-livro">Título do livro</label>
                                        <input type="text" id="titulo-livro" name="titulo-livro"
                                            placeholder="Título do livro" value="Livro">
                                        <label for="autor-livro">Nome do autor</label>
                                        <input type="text" id="autor-livro" name="autor-livro"
                                            placeholder="Nome do autor do livro" value="autor">
                                        <label for="ano-pub">Ano de publicação</label>
                                        <input name="ano-pub" id="ano-pub" type="number" placeholder="Ano de publicação"
                                            max="2024" value="1990">
                                    </div>
                                    <div class="esquerda">
                                        <label for="sinopse">Sinopse</label><br>
                                        <textarea name="sinopse" rows="7" cols="50" id="sinopse">Sinopse</textarea>
                                        <br>
                                        <label>Nota média da internet</label><br>
                                        <div class="rating">
                                            <label>
                                                <input type="radio" name="nota-net" value="1" />
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="nota-net" value="2" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="nota-net" value="3" checked />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="nota-net" value="4" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="nota-net" value="5" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                        </div><br>

                                    </div>
                                </div>
                                <hr>


                                <div class="formulario">

                                    <div class="esquerda">
                                        <label for="autor">Autor</label><br>
                                        <input type="text" id="autor" name="autor" value="pedro_123" readonly><br>
                                        <label for="titulo">Título</label><br>
                                        <input type="text" id="titulo" name="titulo" placeholder="Título da sua review"
                                            value="Título">
                                        <div class="rating">
                                            <label>
                                                <input type="radio" name="stars" value="1" />
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="2" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="3" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="4" checked="checked" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                            <label>
                                                <input type="radio" name="stars" value="5" />
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                                <span class="icon">★</span>
                                            </label>
                                        </div>
                                        <br>
                                        <label for="conteudo">Review</label><br>
                                        <textarea type="text" id="conteudo" name="conteudo"
                                            placeholder="Conteudo da sua review" rows="7"
                                            cols="50">Sua review</textarea>
                                    </div>

                                    <div class="direita">
                                        <div class="img-prev"><img id="preview2" src="../../../public/assets/capa.jpg"
                                                alt="Pré-visualização da imagem">
                                        </div>
                                        <label for="img">Selecione uma imagem:</label>
                                        <input type="file" id="img-edita" name="img" accept="image/*">
                                        <label for="data">Data da leitura:</label>
                                        <input type="date" id="prev-data" value="2024-03-14" name="data">
                                    </div>

                                </div>
                                <input type="hidden" value="<?php echo $post->id ?>" name="id">
                                <input type="submit" value="Salvar">

                            </form>

                            <button class="fecha" onclick="fecharModal('edit-post<?php $post->id ?>')">&times;</button>

                        </div>

                    </div>

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
                                <input type="text" id="titulo-livro" name="titulo-livro" placeholder="Título do livro">
                                <label for="autor-livro">Nome do autor</label>
                                <input type="text" id="autor-livro" name="autor-livro"
                                    placeholder="Nome do autor do livro">
                                <label for="ano-pub">Ano de publicação</label>
                                <input name="ano-pub" id="ano-pub" type="number" placeholder="Ano de publicação"
                                    max="2024">
                            </div>
                            <div class="esquerda">
                                <label for="sinopse">Sinopse</label><br>
                                <textarea name="sinopse" rows="7" cols="50" id="sinopse"></textarea>
                                <br>
                                <label>Nota média da internet</label><br>
                                <div class="rating">
                                    <label>
                                        <input type="radio" name="nota-net" value="1" />
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="nota-net" value="2" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="nota-net" value="3" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="nota-net" value="4" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="nota-net" value="5" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                </div><br>

                            </div>
                        </div>
                        <hr>
                        <div class="formulario">
                            <div class="esquerda">
                                <label for="autor">Autor</label><br>
                                <input type="text" id="autor" name="autor" value="pedro_123" readonly><br>
                                <label for="titulo">Título</label><br>
                                <input type="text" id="titulo" name="titulo" placeholder="Título da sua review"><br>
                                <label>Sua nota</label><br>
                                <div class="rating">
                                    <label>
                                        <input type="radio" name="nota-user" value="1" />
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="nota-user" value="2" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="nota-user" value="3" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="nota-user" value="4" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="nota-user" value="5" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                </div>
                                <br>
                                <label for="conteudo">Review</label><br>
                                <textarea type="text" id="conteudo" name="conteudo" placeholder="Conteudo da sua review"
                                    rows="7" cols="50"></textarea>
                            </div>
                            <div class="direita">
                                <div class="img-prev"><img id="preview" src="" alt="Pré-visualização da imagem"
                                        style="display: none;">
                                </div>
                                <label for="img">Selecione uma imagem:</label>
                                <input type="file" id="img-adc" name="img" accept="image/*">
                                <label for="data">Data da leitura:</label>
                                <input type="date" id="data-adc" name="data">
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
        <div class="paginacao">
            <button class="botoes-fora-tabela" id="botao-voltar"><i class="bi bi-chevron-left"></i>Voltar</button>
            <button class="botoes-fora-tabela" id="botao-avancar">Avançar<i class="bi bi-chevron-right"></i></button>
        </div>
    </main>
</body>
<script src="../../../public/js/admin-lista-de-posts.js"></script>

</html>