
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<?php
#autoload do composer, carrega classes automáticamente
require 'vendor/autoload.php';
require 'rotas.php';

#try catch em php
/* use sistema\Core\Helpers;

try{
    echo(Helpers::validarUrl("dasdasd"));
}catch (Exception $e){
    echo $e->getMessage();
}finally{
    echo '<br>Validação Finalizada';{
        echo $post
    }
} */

#conexão com db em PHP

use sistema\Modelo\PostModelo;

$posts = (new PostModelo())->read();

foreach($posts as $post){
    echo $post->titulo.': ';
    echo $post->texto.'<br>';
}