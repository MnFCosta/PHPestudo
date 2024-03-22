<?php

namespace sistema\Controlador;

use sistema\Core\Controlador;

class Controller extends Controlador
{

    public function __construct()
    {
        parent::__construct('templates/site/views');
    }

    public function index(): void
    {
        echo $this->template->renderizar('index.html', ['titulo' => 'Página Inicial']);
    }

    public function sobre(): void
    {
        echo $this->template->renderizar('sobre.html', ['textosobre' => 'TEXTO SOBRE O SITE']);
    }

    public function erro(): void
    {
        echo $this->template->renderizar('erro.html', ['titulo' => 'Página não encontrada']);
    }
}