<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Story Stroll</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../../../public/css/landing.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<div class="conteiner">
    <div class="p1">
        <?php require("navbar.php");?>

        <div class="home1">
            <img class="mainimg" id="mainimg-id" src="../../../public/assets/arte1.svg">
            <div class="agrupamento">
                <h1 class="titulo">STORY STROLL</h1>
                <div class="subtitulo">
                    <p class="textsub">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in enim finibus diam
                        mollis
                        hendrerit quis rhoncus lorem.
                    </p>
                </div>
                <?php 
                $tam=sizeof($posts)-1;
                $numeros = range(0, $tam); // Cria um vetor com números de 0 até x
                shuffle($numeros); // Embaralha os números aleatoriamente
                    
                ?>
                <div class="livros">
                    <div id="fotoscima">
                        <div class="swiper bloco1">
                            <div id="blo1" class="swiper-wrapper">
                            </div>
                        </div>
                        <div class="swiper bloco2">
                            <div id="blo2" class="swiper-wrapper"></div>
                        </div>
                    </div>
                    <div id="fotosbaixo">
                        <div class="swiper bloco3">
                            <div id="blo3" class="swiper-wrapper"></div>
                        </div>
                        <div class="swiper bloco4">
                            <div id="blo4" class="swiper-wrapper"></div>
                        </div>
                    </div>
                </div>
                <img class="arrow" onclick="scrolla()" id="arrow-id" href="end" src="../../../public/assets/arrow.svg">
            </div>

        </div>
    </div>
    <div class="p2">
        <div class="separador-mobile" onclick="scrolla()">
            <p>Posts Recentes</p>
            <img src="../../../public/assets/arrow.svg">
        </div>

        <div class="posts">
            <?php $indice=sizeof($posts)-1;?>
            <?php for ($i = 0; $i < 5; $i++): ?>
            <div class="post">
                <div class="imagpost" id="p">
                    <img src="<?= $posts[$indice]->imagem ?>">
                    <?php 
                        if (mb_strlen($posts[$indice]->titulo_post) > 16) {
                            $posts[$indice]->titulo_post = mb_substr($posts[$indice]->titulo_post, 0, 16) . '...';
                        }
                    ?>
                    <h3 class="titulo-comentario"><?= $posts[$indice]->titulo_post ?></h3>
                </div>
                <div class="mb">
                    <div class="estrelas" style="margin-bottom:6px;">
                        <?php
                            $aux = $posts[$indice]->nota_user;
                            for ($k = 0; $k < 5; $k++) {
                                if ($aux > 0) {
                                    echo '<span class="icon" style="color: #f5d000;">★</span>';
                                    $aux--;
                                } else {
                                    echo '<span class="icon-cinza" style="color: #D9D9D9;">★</span>';
                                }
                            }
                        ?>
                    </div>
                    <?php 
                        if (mb_strlen($posts[$indice]->review) > 97) {
                            $posts[$indice]->review = mb_substr($posts[$indice]->review, 0, 97) . '...';
                        }
                    ?>
                    <?php 
                        if (mb_strlen($posts[$indice]->name) > 16) {
                            $posts[$indice]->review = mb_substr($posts[$indice]->name, 0, 16) . '...';
                        }
                    ?>
                    <div class="cometario">
                        <h3><?= $posts[$indice]->name?></h3>
                        <p>
                            <?= $posts[$indice]->review ?>
                        </p>
                        <div class="ver">
                            <p>ver mais</p><img src="../../../public/assets/arrow.svg">
                        </div>
                    </div>
                </div>
            </div>
            <?php $indice--;?>
            <?php endfor; ?>
            <div class="bt-vermais">
                <p>Ver Mais</p><img src="../../../public/assets/arrow.svg">
            </div>
        </div>
        <?php require("footer.php");?>
    </div>
</div>
</div>
</div>

<script>
const numImg = <?= count($posts) ?>;
<?php $vetImg=shuffle($posts);?>

function onload(i, k) { //cria um vetor com uma ordem aleatoria para as imagens e popula o slideshow
    id1 = "blo" + i.toString();
    id2 = "blo" + k.toString();
    var ar = gerarArrayAleatorio(numImg);

    for (k = 0; k < numImg; k++) {
        document.getElementById(id1).innerHTML +=
            '<div class="swiper-slide"><img src="../../../public/assets/capas/capa' + <?= $vetImg[k]->imagem?> +
            '.jpg"></div>';
        if (k + 1 < numImg) {
            document.getElementById(id2).innerHTML +=
                '<div class="swiper-slide"><img src="../../../public/assets/capas/capa' + ar[k + 1] + '.jpg"></div>';
        }
    }
    document.getElementById(id2).innerHTML += '<div class="swiper-slide"><img src="../../../public/assets/capas/capa' +
        ar[0] + '.jpg"></div>';
}
</script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="../../../public/js/landing.js">


</script>
</body>

</html>