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


        </div>
        <div class="coluna3">
            <div class="coluna-box">

            </div>
        </div>
    </main>
    <?php require("footer.php");?>
</body>

</html>