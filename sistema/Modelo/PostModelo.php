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

    public function readcategoria(int $id): array
    {   
        $query = "SELECT * FROM posts WHERE categoria_id = {$id}";
        $stmt = Conexao::getInstance()->query($query); 

        $retorno = $stmt->fetchAll();

        return $retorno;
    }

    public function buscar(string $texto)
    {   
        $query = "SELECT * FROM posts WHERE titulo LIKE '%{$texto}%'";
        $db = Conexao::getInstance()->query($query);
        $resultado = $db->fetchAll();

        return $resultado;
    }
}