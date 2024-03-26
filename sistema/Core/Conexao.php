<?php 

namespace sistema\Core;

use PDO;
use PDOException;

class Conexao
{   
    #Conexão a banco de dados utilizando padrão Singleton(Apenas uma instancia da classe pode existir)
    private static $instancia;

    public static function getInstance(): PDO
    {
        if (empty(self::$instancia)){
            try{
                self::$instancia = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.'; dbname='.DB_NAME, DB_USER, '', [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_CASE => PDO::CASE_NATURAL,
                ]);
            }catch(PDOException $e){
                die('Erro de conexão com a database'.$e->getMessage());
            }
        }
        return self::$instancia;
    }

    protected function __construct()
    {

    }

    private function __clone(): void
    {

    }
}