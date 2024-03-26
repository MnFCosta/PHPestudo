<?php

namespace sistema\Modelo;

use sistema\Core\Conexao;

class CategoriaModelo
{
    public function read(): array
    {   
        $query = "SELECT * FROM categorias ORDER BY titulo ASC";
        $stmt = Conexao::getInstance()->query($query); 

        $retorno = $stmt->fetchAll();

        return $retorno;
    }

    public function readId(int $id): bool|object
    {   
        $where = "WHERE id = {$id}";
        $query = "SELECT * FROM categorias {$where}";
        $stmt = Conexao::getInstance()->query($query); 

        $retorno = $stmt->fetch();

        return $retorno;
    }
}