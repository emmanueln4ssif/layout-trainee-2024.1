<?php

/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}

function viewEstrela($nota, $tam)
{
    $vetor = [
        $nota_user = $nota,
        $tamanho = $tam
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