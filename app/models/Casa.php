<?php

require_once('Database.php');

class Casas {

    function __construct() {
        $this->pdo = Database::conexao();
    }

    public $id_casa;
    public $casa_oracao;
    public $rua;
    public $numero;
    public $cidade;
    public $cep;
    public $numero_relatorio;


    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }

  
    public function getCasas(){
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM casas_oracao ORDER BY casa_oracao;");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        } catch (PDOException $exc) {
            echo get_class($this).": {$exc->getMessage()}";
        }
    }

}