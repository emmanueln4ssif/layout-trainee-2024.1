<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de Estrelas</title>
    <link rel="stylesheet" href="../../../public/css/estrelas.css">
</head>
<body onload = "generateStars(<?=$tamanho?>, <?=$nota_user?>)">
    <div class="container">
        <div id="stars-container"></div>
    </div>
</body>
<script src="../../../public/js/estrelas.js"></script>
</html>
