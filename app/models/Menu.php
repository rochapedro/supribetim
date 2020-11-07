<?php

require_once('Database.php');

class Menus {

    function __construct() {
        $this->pdo = Database::conexao();
    }

    public $id_menu;
    public $nome;
    public $descricao;
    public $botao;
    public $link;


    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }

  
    public function getMenus(){
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM menu;");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        } catch (PDOException $exc) {
            echo get_class($this).": {$exc->getMessage()}";
        }
    }

}