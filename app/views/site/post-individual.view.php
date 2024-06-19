<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/post-individual.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap">
    <link rel="icon" type="image/x-icon" href="../../../public/assets/logo_sf.png">
    <title>Story Stroll - <?= $post[0]->titulo_post?></title>
</head>

<body>
    <?php require("navbar.php");?>
    <div class="container1">
        <div class="img_txt">
            <img src="../<?= $post[0]->imagem?>" class="imagem" alt="Imagem do livro">
            <div class="data" id="livro-ano">Publicado em <?= $post[0]->livro_ano?></div>
            <div class="amostra" id="amostra">Amostra gratis</div>

        </div>
        <div class="conteudo">
            <div class="titulo" id="livro_titulo"><?= $post[0]->livro_titulo?></div>
            <div class="autor" id="autor-livro"><?= $post[0]->livro_autor?></div>
            <div class="estrela_sinopse">
                <div class="estrelas">
                    <?php viewEstrela($post[0]->id."1", 35, $post[0]->nota_internet)?>
                </div>
                <div class="sinopse">
                    <p class="resumo"><?= $post[0]->sinopse?></p>
                </div>

            </div>
        </div>
    </div>
    <div class="elementos_review">
        <div id="img_user"><img src="../../../public/assets/usuario-rosa.svg"></div>

        <div id="bloco_review">
            <div id="nome_user">
                <?= $post[0]->name?>
            </div>
            <div class="estrelas_data">
                <div class="estrelas">
                    <?php viewEstrela($post[0]->id."2", 25, $post[0]->nota_user)?>
                </div>
                <?php
                $comp = explode('-', $post[0]->data_post);
                $datapostFormatada = $comp[2] . '/' . $comp[1] . '/' . $comp[0];
                ?>
                <p id="data"><?= $datapostFormatada?></p>
            </div>

            <div id="bloco">
                <h2 class="titulo_rev"><?=$post[0]->titulo_post?></h2>
                <p><?= nl2br( $post[0]->review)?></p>
            </div>
        </div>
    </div>
    <script src="../../../public/js/individual.js"></script>
    <?php require("footer.php");?>