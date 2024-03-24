<?php

namespace sistema\Modelo;

use sistema\Core\Conexao;

class PostModelo
{
    public function read()
    {
        $query = "SELECT titulo,texto FROM posts ";
        $stmt = Conexao::getInstance()->query($query); 

        $retorno = $stmt->fetchAll();

        return $retorno;
    }
}