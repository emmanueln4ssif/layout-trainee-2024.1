<?php

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [], $data2=[])
{
    extract($data);
    extract($data2);
    return require "app/views/{$name}.view.php";
}

function viewEstrela($id, $tamanho_estrelas, $nota)
{
    $vetor = [
        $containerId = 'stars-container-' . $id,
        $tamanho = $tamanho_estrelas,
        $nota_user = $nota,
    ];

    extract($vetor);

    return require "app/views/site/estrelas.view.php";
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}