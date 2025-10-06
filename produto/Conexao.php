<?php

class Conexao {
    private static $con = null; 
    public static function getConexao() {
        if (self::$con == null) {
            try {
                $opcoes = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                );
                self::$con = new PDO(
                    "mysql:host=localhost;dbname=sistema_produtos",
                    "root",
                    "",
                    $opcoes
                );
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$con;
    }
}
?>