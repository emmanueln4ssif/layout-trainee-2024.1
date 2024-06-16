<head><link rel="stylesheet" href="../../../public/css/estrelas.css"></head>
<div class="container">
    <div id="<?= $containerId ?>" class="star-container"></div>
    <p><?=$nota?></p>
</div>
<script src="../../../public/js/estrelas.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    generateStars("<?= $containerId ?>", <?= $tamanho ?>, <?= $nota ?>);
});
</script>
