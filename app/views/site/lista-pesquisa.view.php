<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/lista.css">
    <link rel="icon" type="image/x-icon" href="../../../public/assets/logo_sf.png">
</head>

<body>
    <main>
        <div class="coluna1">
            <div class="buscar-box">
                <div class="input-buscar">
                    <input type="search" name="search" id="search" placeholder="Buscar Postagens">
                </div>
                <div class="lupa">
                    <button onclick="searchData()"><img src="../../../public/assets/lupa.svg"></button>
                </div>
            </div>
        </div>

        <div class="coluna2">
            <?php foreach ($post_pesquisado as $post) :?>
            <div class="forma-post1">
                <div class="espassocapa">
                    <div class="espasso">
                        <div class="fotouser">
                            <img src="/public/assets/FOTOPERFIL.svg">
                        </div>

                        <div class="usuario">
                            <h1><?php echo $post->name ?></h1>
                            <div class="estrelas">
                                <?= $post->nota_user?>
                            </div>
                        </div>
                    </div>
                    <div class="digitado">
                        <h1><?php echo $post->review ?></h1>
                    </div>
                </div>
                <div class="capalivro1">
                    <img src="<?php echo $post->imagem ?>">
                </div>
            </div>
            <?php endforeach ?>

            <!--    <div class="forma-post1">
                <div class="espassocapa">
                    <div class="espasso">
                        <div class="fotouser">
                            <img src="/public/assets/FOTOPERFIL.svg">
                        </div>
                        <div class="usuario">
                            <h1>Sommelier</h1>
                            <div class="estrelas">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                            </div>
                        </div>
                    </div>
                    <div class="digitado">
                        <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima ipsa consectetur quae
                            dolores nemo iusto debitis molestias temporibus nihil, eum tempore, sit quam rerum repellat
                            vel, praesentium quo autem blanditiis!</h1>
                    </div>
                </div>
                <div class="capalivro1">
                    <img src="/public/assets/A1uUKJ5uzCL 1.svg">
                </div>
            </div>  
            <div class="forma-post1">
                <div class="espassocapa">
                    <div class="espasso">
                        <div class="fotouser">
                            <img src="/public/assets/FOTOPERFIL.svg">
                        </div>
                        <div class="usuario">
                            <h1>Sommelier</h1>
                            <div class="estrelas">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                            </div>
                        </div>
                    </div>
                    <div class="digitado">
                        <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima ipsa consectetur quae
                            dolores nemo iusto debitis molestias temporibus nihil, eum tempore, sit quam rerum repellat
                            vel, praesentium quo autem blanditiis!</h1>
                    </div>
                </div>
                <div class="capalivro1">
                    <img src="/public/assets/A1uUKJ5uzCL 1.svg">
                </div>
            </div>
            <div class="forma-post1">
                <div class="espassocapa">
                    <div class="espasso">
                        <div class="fotouser">
                            <img src="/public/assets/FOTOPERFIL.svg">
                        </div>
                        <div class="usuario">
                            <h1>Sommelier</h1>
                            <div class="estrelas">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                            </div>
                        </div>
                    </div>
                    <div class="digitado">
                        <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima ipsa consectetur quae
                            dolores nemo iusto debitis molestias temporibus nihil, eum tempore, sit quam rerum repellat
                            vel, praesentium quo autem blanditiis!</h1>
                    </div>
                </div>
                <div class="capalivro1">
                    <img src="/public/assets/A1uUKJ5uzCL 1.svg">
                </div>
            </div>
            <div class="forma-post1">
                <div class="espassocapa">
                    <div class="espasso">
                        <div class="fotouser">
                            <img src="/public/assets/FOTOPERFIL.svg">
                        </div>
                        <div class="usuario">
                            <h1>Sommelier</h1>
                            <div class="estrelas">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                                <img src="/public/assets/ESTRELA.svg">
                            </div>
                        </div>
                    </div>
                    <div class="digitado">
                        <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima ipsa consectetur quae
                            dolores nemo iusto debitis molestias temporibus nihil, eum tempore, sit quam rerum repellat
                            vel, praesentium quo autem blanditiis!</h1>
                    </div>
                </div>
                <div class="capalivro1">
                    <img src="/public/assets/A1uUKJ5uzCL 1.svg">
                </div>
            </div>  -->
        </div>
        <div class="coluna3">
            <div class="coluna-box">

            </div>
        </div>
    </main>
</body>
<script>
let pesquisa = document.getElementById('search');

pesquisa.addEventListener("keydown", function(event) {

    if (event.key === "Enter") {
        searchData();
    }

});

function searchData() {

    window.location = 'listaPosts?search=' + pesquisa.value;

};
</script>

</html>