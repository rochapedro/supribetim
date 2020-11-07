<?php

require_once('Database.php');



class Registro {

    function __construct() {
        $this->pdo = Database::conexao();
    }

    public $id_movimento;
    public $id_pessoa;
    public $temperatura;
    public $id_casa;

    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }

    public function cadastrarRegistro(){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO movimento (id_pessoa, temperatura, id_casa, usuario) VALUES 
                (:id_pessoa, :temperatura, :id_casa, :id_usuario)");
            $param = array(
                ":id_pessoa" => $this->id_pessoa,
                ":temperatura" => $this->temperatura,
                ":id_casa" => $this->id_casa,
                ":id_usuario" => $this->id_usuario,
            );
            return $stmt->execute($param);
        } catch (PDOException $exc) {
            echo get_class($this).": {$exc->getMessage()}";
        }
    }

    public function getRegistros($id_casa, $data_inicial, $data_final){
        try{
            $stmt = $this->pdo->prepare("SELECT m.*, p.id_pessoa, p.nome, p.telefone, p.rua, p.numero, p.bairro, p.cidade FROM  movimento as m JOIN pessoa as p ON m.id_pessoa = p.id_pessoa WHERE DATE_FORMAT(m.data, '%Y-%m-%d') BETWEEN '$data_inicial' AND '$data_final' AND m.id_casa = $id_casa AND m.ativo = 1;");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        } catch (PDOException $exc) {
            echo get_class($this).": {$exc->getMessage()}";
        }
    }

    public function editarRegistros() {
        try {
            $stmt = $this->pdo->prepare("UPDATE movimento SET id_pessoa = :id_pessoa, temperatura = :temperatura WHERE id_movimento = :id_movimento");
            $param = array(
                ":id_movimento" => $this->id_movimento,
                ":id_pessoa" => $this->id_pessoa,
                ":temperatura" => $this->temperatura,
            );
            return $stmt->execute($param);
        } catch (PDOException $exc) {
            echo "ERRO 07 [MSG_Usuario]: {$exc->getMessage()}";
        }
    } 


    public function deletarRegistro() {
        try {
            $stmt = $this->pdo->prepare("UPDATE movimento SET ativo = 0 WHERE id_movimento = :id_movimento");
            $param = array(
                ":id_movimento" => $this->id_movimento
            );
            return $stmt->execute($param);
        } catch (PDOException $exc) {
            echo "ERRO 03 [MSG_Usuario]: {$exc->getMessage()}";
        }
    }


}