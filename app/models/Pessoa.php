<?php

require_once('Database.php');

class Pessoa {

    function __construct() {
        $this->pdo = Database::conexao();
    }

    public $id_pessoa;
    public $nome;
    public $rua;
    public $numero;
    public $bairro;
    public $telefone;
    public $comum;
    public $cidade;

    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }

    public function cadastrarPessoa(){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO pessoa (nome, telefone, rua, numero, bairro, cidade, id_casa, usuario) VALUES 
                (:nome, :telefone, :rua, :numero, :bairro, :cidade, :id_casa, :id_usuario)");
            $param = array(
                ":nome" => $this->nome,
                ":telefone" => $this->telefone,
                ":rua" => $this->rua,
                ":numero" => $this->numero,
                ":bairro" => $this->bairro,
                ":cidade" => $this->cidade,
                ":id_casa" => $this->id_casa,
                ":id_usuario" => $this->id_usuario,
                
            );
            return $stmt->execute($param);
        } catch (PDOException $exc) {
            echo get_class($this).": {$exc->getMessage()}";
        }
    }

    public function getPessoas(){
        try{
            $stmt = $this->pdo->prepare("SELECT p.*, c.casa_oracao FROM pessoa as p JOIN casas_oracao as c ON p.id_casa = c.id_casa WHERE p.ativo = 1 order by p.nome;");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        } catch (PDOException $exc) {
            echo get_class($this).": {$exc->getMessage()}";
        }
    }

    public function editarPessoas() {
        try {
            $stmt = $this->pdo->prepare("UPDATE pessoa SET nome = :nome, telefone = :telefone, rua = :rua, numero = :numero, bairro = :bairro, cidade = :cidade, id_casa = :id_casa, usuario = :id_usuario WHERE id_pessoa = :id_pessoa");
            $param = array(
                ":id_pessoa" => $this->id_pessoa,
                ":nome" => $this->nome,
                ":telefone" => $this->telefone,
                ":rua" => $this->rua,
                ":numero" => $this->numero,
                ":bairro" => $this->bairro,
                ":cidade" => $this->cidade,
                ":id_casa" => $this->id_casa,
                ":id_usuario" => $this->id_usuario,
            );
            return $stmt->execute($param);
        } catch (PDOException $exc) {
            echo "ERRO 07 [MSG_Usuario]: {$exc->getMessage()}";
        }
    } 


    public function deletarPessoa() {
        try {
            $stmt = $this->pdo->prepare("UPDATE pessoa SET ativo = 0 WHERE id_pessoa = :id_pessoa");
            $param = array(
                ":id_pessoa" => $this->id_pessoa
            );
            return $stmt->execute($param);
        } catch (PDOException $exc) {
            echo "ERRO 03 [MSG_Usuario]: {$exc->getMessage()}";
        }
    }


}