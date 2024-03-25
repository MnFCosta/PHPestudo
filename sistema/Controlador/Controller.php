<?php

namespace sistema\Controlador;

use sistema\Core\Controlador;
use sistema\Modelo\PostModelo;
use sistema\Core\Helpers;

class Controller extends Controlador
{

    public function __construct()
    {
        parent::__construct('templates/site/views');
    }

    public function index(): void
    {
        $posts = (new PostModelo)->read();

        echo $this->template->renderizar('index.html', ['titulo' => 'Página Inicial', 'posts' => $posts]);
    }

    public function sobre(): void
    {
        echo $this->template->renderizar('sobre.html', ['textosobre' => 'TEXTO SOBRE O SITE']);
    }

    public function erro(): void
    {
        echo $this->template->renderizar('erro.html', ['titulo' => 'Página não encontrada']);
    }

    public function postdetail(int $id): void
    {
        $post = (new PostModelo)->readId($id);

        if (!$post){
            Helpers::redirecionar('404');
        }

        echo $this->template->renderizar('detail.html', ['titulo' => "Post {$id}", 'post' => $post]);
    }
} 