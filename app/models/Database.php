<?php

class Database
{
   
    protected static $db;
    
    private function __construct()
    {
        $db_host = "192.185.215.154";
        $db_nome = "bookom43_supribetim";
        $db_usuario = "bookom43_mirian";
        $db_senha = "ccb_2017";
        $db_driver = "mysql";
        try
        {
            self::$db = new PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$db->exec('SET NAMES utf8');
        }
        catch (PDOException $e)
        {
            die("Connection Error: " . $e->getMessage());
        }
    }

    public static function conexao()
    {
        if (!self::$db)
        {
            new Database();
        }
        return self::$db;
    }

}