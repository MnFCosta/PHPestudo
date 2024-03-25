<?php

namespace sistema\Modelo;

use sistema\Core\Conexao;

class PostModelo
{
    public function read(): array
    {   
        $query = "SELECT * FROM posts";
        $stmt = Conexao::getInstance()->query($query); 

        $retorno = $stmt->fetchAll();

        return $retorno;
    }

    public function readId(int $id): bool|object
    {   
        $where = "WHERE id = {$id}";
        $query = "SELECT * FROM posts {$where}";
        $stmt = Conexao::getInstance()->query($query); 

        $retorno = $stmt->fetch();

        return $retorno;
    }
}