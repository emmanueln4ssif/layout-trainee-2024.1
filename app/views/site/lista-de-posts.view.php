<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Story Stroll - Publicações</title>
    <link rel="stylesheet" href="/public/css/lista.css">
    <link rel="icon" type="image/x-icon" href="../../../public/assets/logo_sf.png">
</head>

<body>
    <?php require("navbar.php");?>

    <main>

        <div class="coluna1">
            <div class="buscar-box" onclick="document.getElementById('search').focus();" style="cursor:text;">
                <div class="input-buscar">
                    <input type="search" name="search" id="search" placeholder="Buscar Postagens">
                </div>
                <div class="lupa">
                    <button onclick="searchData()"><img src="../../../public/assets/lupa.svg"></button>
                </div>
            </div>
        </div>
        <div class="coluna2">
            <?php 
                if(count($posts)<1){
                    echo"<p class='postNao'>Nenhuma publicação encontrada</p>";
                }
            ?>
            <?php foreach($posts as $post): ?>
            <div class="forma-post1" onclick="location.href='publicacoes/post?id=<?=$post->id?>';">
                <div class="espassocapa">
                    <div class="espasso">
                        <div class="fotouser">
                            <img width="60px" src="../../../public/assets/usuario-rosa.svg">
                        </div>
                        <div class="usuario">
                            <h2>
                                <?php 
                                foreach($users as $user){
                                    if($user->id == $post->user_id){
                                        echo $user->name;
                                    }
                                }
                                ?>
                            </h2>
                            <div class="estrelas">
                                <?php viewEstrela($post->id, 25, $post->nota_user)?>
                            </div>
                        </div>
                    </div>
                    <div class="titulo-do-post">
                        <h3><?php 
                            if (mb_strlen($post->titulo_post) > 50) {
                                $post->titulo_post = mb_substr($post->titulo_post, 0, 50) . '...';
                                echo $post->titulo_post;
                            }
                            else
                                echo $post->titulo_post;
                            ?></h3>
                    </div>
                    <div class="digitado">
                        <?php 
                        if (mb_strlen($post->review) > 220) {
                            $post->review = mb_substr($post->review, 0, 220) . '...';
                        }
                    ?>
                        <p class="review">
                            <?= $post->review ?>
                        </p>
                    </div>
                </div>
                <div class="capalivro1">
                    <img style="border-radius: 10px;" src="<?php if($post->imagem != null){echo $post->imagem;}?>"
                        width="140px">
                </div>
            </div>
            <?php endforeach; ?>
            <?php if(!$pesquisa): ?>
            <div id="alternador" class="paginacao">
                <?php
                if ($page - 1 > 0) {
                    echo "<button id='inicio' class='btn btn-voltar' onclick=\"location.href='?pagina=1';\">Início</button>";
                } else {
                    echo "<button id='inicio' class='btn btn-voltar cs'>Início</button>";
                }
                ?>
                <?php
                if ($page - 1 > 0) {
                    echo "<button id='voltar' class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">&lt; Voltar</button>";
                } else {
                    echo "<button id='voltar' class='btn btn-voltar cs'>&lt; Voltar</button>";
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
                    echo "<button id='avancar' class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar &gt</button>";
                } else {
                    echo "<button id='avancar' class='btn btn-avancar cs'>Avançar &gt</button>";
                }
                ?>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button id='fim' class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($total_pages) . "';\">Fim</button>";
                } else {
                    echo "<button id='fim' class='btn btn-avancar cs'>Fim</button>";
                }
                ?>
            </div>


            <div id="alternador2" class="paginacao">
                <?php
                if ($page - 1 > 0) {
                    echo "<button id='inicio' class='btn btn-voltar' onclick=\"location.href='?pagina=1';\">Início</button>";
                } else {
                    echo "<button id='inicio' class='btn btn-voltar cs'>Início</button>";
                }
                ?>
                <?php
                if ($page - 1 > 0) {
                    echo "<button id='voltar' class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">&lt; Voltar</button>";
                } else {
                    echo "<button id='voltar' class='btn btn-voltar cs'>&lt; Voltar</button>";
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
                    echo "<button id='avancar' class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar &gt</button>";
                } else {
                    echo "<button id='avancar' class='btn btn-avancar cs'>Avançar &gt</button>";
                }
                ?>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button id='fim' class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($total_pages) . "';\">Fim</button>";
                } else {
                    echo "<button id='fim' class='btn btn-avancar cs'>Fim</button>";
                }
                ?>
            </div>

            <div id="alternador3" class="paginacao">
                <?php
                if ($page - 1 > 0) {
                    echo "<button id='inicio' class='btn btn-voltar' onclick=\"location.href='?pagina=1';\">Início</button>";
                } else {
                    echo "<button id='inicio' class='btn btn-voltar cs'>Início</button>";
                }
                ?>
                <?php
                if ($page - 1 > 0) {
                    echo "<button id='voltar' class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">&lt; Voltar</button>";
                } else {
                    echo "<button id='voltar' class='btn btn-voltar cs'>&lt; Voltar</button>";
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
                    echo "<button id='avancar' class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar &gt</button>";
                } else {
                    echo "<button id='avancar' class='btn btn-avancar cs'>Avançar &gt</button>";
                }
                ?>
                <?php
                if ($page + 1 <= $total_pages) {
                    echo "<button id='fim' class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($total_pages) . "';\">Fim</button>";
                } else {
                    echo "<button id='fim' class='btn btn-avancar cs'>Fim</button>";
                }
                ?>
            </div>

            <div id="alternador4" class="paginacao">

                <?php
                if ($page - 1 > 0) {
                    echo "<button id='voltar' class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">&lt; Voltar</button>";
                } else {
                    echo "<button id='voltar' class='btn btn-voltar cs'>&lt; Voltar</button>";
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
                    echo "<button id='avancar' class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar &gt</button>";
                } else {
                    echo "<button id='avancar' class='btn btn-avancar cs'>Avançar &gt</button>";
                }
                ?>

            </div>

            <div id="alternador5" class="paginacao">

                <?php
                if ($page - 1 > 0) {
                    echo "<button id='voltar' class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">&lt; Voltar</button>";
                } else {
                    echo "<button id='voltar' class='btn btn-voltar cs'>&lt; Voltar</button>";
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
                    echo "<button id='avancar' class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar &gt</button>";
                } else {
                    echo "<button id='avancar' class='btn btn-avancar cs'>Avançar &gt</button>";
                }
                ?>

            </div>
            <div id="alternador6" class="paginacao">

                <?php
                if ($page - 1 > 0) {
                    echo "<button id='voltar' class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">Voltar</button>";
                } else {
                    echo "<button id='voltar' class='btn btn-voltar cs'>Voltar</button>";
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
                    echo "<button id='avancar' class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar</button>";
                } else {
                    echo "<button id='avancar' class='btn btn-avancar cs'>Avançar</button>";
                }
                ?>

            </div>
            <?php endif; ?>
        </div>
        <div class="coluna3">
            <div class="coluna-box">

            </div>
        </div>
    </main>
    <script>
    let pesquisa = document.getElementById('search');

    pesquisa.addEventListener("keydown", function(event) {

        if (event.key === "Enter") {
            searchData();
        }

    });

    function searchData() {
        if (pesquisa.value != '') {
            window.location = 'listaPosts?search=' + pesquisa.value;
        }
    };
    </script>
    <?php require("footer.php");?>
</body>

</html>