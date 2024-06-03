<?php

namespace App\Core\Database;
use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectAllcomNome($table)
    {
        //seleciona tudo da $table e name da tabela users quando o user_id da $table é igual ao id da tabela user
        $sql = sprintf('SELECT %s.*, users.name FROM %s INNER JOIN users ON %s.user_id = users.id', $table,$table,$table);

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function inserir($table, $parameters, $img){
        $pasta = "uploads/";
        $caminho = $pasta . basename($img["name"]);
        move_uploaded_file($img["tmp_name"], $caminho);
        $parameters['imagem']=$caminho;
        $sql = sprintf('INSERT INTO %s (%s) VALUES (:%s)',
        $table,
        implode(', ', array_keys($parameters)),
        implode(', :', array_keys($parameters))
        );
        
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editar($table, $id, $img)
    {
        $pasta = "uploads/";
        $caminho = $pasta . basename($img["name"]);
        move_uploaded_file($img["tmp_name"], $caminho);
        $parameters['imagem'] = $caminho;
        $sql = sprintf("UPDATE %s SET %s WHERE id = %s",
            $table,
            implode(", ", array_map(function($param){
                return $param . " = :" . $param;
            }, array_keys($parameters))),
            $id
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deletar($table, $id)
    {
        $sql = sprintf("DELETE FROM %s WHERE id = %s",
            $table,
            $id
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(compact($id));
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    
}