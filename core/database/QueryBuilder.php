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
    public function edita ($table, $parameters, $id)
    {
        
        $sql = sprintf('UPDATE %s SET %s WHERE id = %d', 
        $table,
        implode(', ', array_map(function($param) {
        return $param . ' = :' . $param;
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
    public function selectAll($table, $inicio=null,$rows_count=null)
    {
        
        $sql = "select * from {$table}";
        
        if($rows_count>0 && $inicio >=0){
            $sql .= " LIMIT {$inicio}, {$rows_count}";
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectSearch($pesquisa)
    {
        $sql = "SELECT * FROM `posts` WHERE `titulo_post` LIKE '%$pesquisa%' OR `livro_titulo` LIKE '%$pesquisa%'";
         
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function selectAllDesc($table)
    {

        $sql = sprintf('SELECT %s.*, users.name FROM %s INNER JOIN users ON %s.user_id = users.id ORDER BY id DESC', $table,$table,$table);

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert($table, $parameters){

        $sql = sprintf(
            'INSERT INTO %s(%s) VALUES (%s)', 
            $table, 
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);

        } catch (Exception $e) {

            die($e->getMessage());

        }

    }

    public function delete($table, $id){

        $sql = sprintf(
            'DELETE FROM %s WHERE %s',
            $table,
            "id = :id"
        );

        try {

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(compact('id'));

        } catch (Exception $e) {

            die($e->getMessage());

        }

    }

    public function selectAllcomNome($table, $inicio = null, $rows_count = null)
    {
        //seleciona tudo da $table e name da tabela users quando o user_id da $table é igual ao id da tabela user
        $sql = sprintf('SELECT %s.*, users.name FROM %s INNER JOIN users ON %s.user_id = users.id', $table,$table,$table);
        if($rows_count>0 && $inicio >=0){
            $sql .= " LIMIT {$inicio}, {$rows_count}";
        }
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
        $novoNome=uniqid();
        $caminho = $pasta . basename($novoNome);
        $extensao=strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));
        if($extensao != "png" && $extensao != "jpg" && $img["name"] != null){    
            die("<script>
            window.onload = function () {
                alert('Tipo de arquivo não suportado!');
                window.location.href = '/posts';
            };
        </script>");
        }
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

    public function editar($table, $id, $parameters, $img)
    {
        $pasta = "uploads/";
        $novoNome=uniqid();
        $caminho = $pasta . basename($novoNome);
        $extensao=strtolower(pathinfo($img["name"], PATHINFO_EXTENSION));
        if($extensao != "png" && $extensao != "jpg" && $extensao != "svg" && $img["name"] != null){    
            die("<script>
            window.onload = function () {
                alert('Tipo de arquivo não suportado!');
                window.location.href = '/posts';
            };
        </script>");
        }elseif($img["name"]!=null){
            move_uploaded_file($img["tmp_name"], $caminho);
            $parameters['imagem'] = $caminho;
        }
        $sql = sprintf("UPDATE %s SET %s WHERE id = %d",
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
        $sql = sprintf("DELETE FROM %s WHERE id = %d",
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
    public function conta($table){
        $sql = "select COUNT(*) from {$table}";

        try {
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function pegaPost($table, $id){
        $sql = sprintf('SELECT %s.*, users.name FROM %s INNER JOIN users ON %s.user_id = users.id WHERE %s.id = %d;', $table,$table,$table,$table,$id);
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function verificaLogin($email, $senha){

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$senha'";

        try {

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $num_rows = $stmt->rowCount();
            return $num_rows;
            
        } catch (Exception $e) {
            die($e->getMessage());
        }  
    }

    
}