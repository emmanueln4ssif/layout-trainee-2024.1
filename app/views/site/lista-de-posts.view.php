<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/lista.css">
</head>

<body>
    <?php require("navbar.php");?>

    <main>

        <div class="coluna1">
            <div class="buscar-box">
                <div class="lupa">
                    <img src="../../../public/assets/lupa.svg">
                </div>
                <div class="input-buscar">
                    <input type="text" name="" id="" placeholder="Buscar Postagens">
                </div>
            </div>
        </div>
        <div class="coluna2">
            <?php foreach(array_reverse($posts) as $post): ?>
            <div class="forma-post1" onclick="location.href='publicacoes/post?id=<?=$post->id?>';">
                <div class="espassocapa">
                    <div class="espasso">
                        <div class="fotouser">
                            <img width="60px" src="../../../public/assets/usuario-rosa.svg">
                        </div>
                        <div class="usuario">
                            <h2>
                                <?= $post->name ?>
                            </h2>
                            <div class="estrelas">
                                <?php
                            $aux = $post->nota_user;
                            for ($k = 0; $k < 5; $k++) {
                                if ($aux > 0) {
                                    echo '<span class="icon" style="color: #f7e702;">★</span>';
                                    $aux--;
                                } else {
                                    echo '<span class="icon-cinza" style="color: #D9D9D9;">★</span>';
                                }
                            }
                        ?>
                            </div>
                        </div>
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
            <div id="alternador" class="paginacao">
                <?php
                if($page-1>0){
                    echo "<button class='btn btn-voltar' onclick=\"location.href='?pagina=" . ($page - 1) . "';\">&lt; Voltar</button>";
                }else{
                    echo "<button class='btn btn-voltar cs'>&lt; Voltar</button>";
                }

                ?>
                <nav class="navpaginacao">
                    <ul class="paginacao-numeros">
                        <?php for($page_number = 1; $page_number <= $total_pages; $page_number++): ?>
                        <li onclick="location.href = '?pagina=<?= $page_number ?>';" class="paginacao-item"><a
                                style="<?= $page_number == $page ? "color: #f5f5f5; text-decoration: none;" : "" ?>"
                                class="paginacao-link<?= $page_number == $page ? "active" : "" ?>"
                                href="?pagina=<?= $page_number ?>"><?php echo $page_number?></a></li>
                        <?php endfor ?>
                    </ul>
                </nav>
                <?php
                if($page+1<=$total_pages){
                    echo "<button class='btn btn-avancar' onclick=\"location.href='?pagina=" . ($page + 1) . "';\">Avançar
                    &gt</button>";
                }else{
                    echo "<button class='btn btn-avancar cs'>Avançar
                    &gt</button>";
                }

                ?>
            </div>

        </div>
        <div class="coluna3">
            <div class="coluna-box">

            </div>
        </div>
    </main>
    <?php require("footer.php");?>
</body>

</html>