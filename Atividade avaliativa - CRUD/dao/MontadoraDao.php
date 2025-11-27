<?php

include_once(__DIR__."/../util/Connection.php");
include_once(__DIR__."/../model/Montadora.php");

class MontadoraDao{
    private PDO $conn;

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function list(){
        $sql = "SELECT * FROM montadora ORDER BY nome";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    private function map(array $result){
        $montadoras = array();
        foreach($result as $r){
            $montadora = new Montadora();
            $montadora->setId($r['id']);
            $montadora->setNome($r['nome']);

            array_push($montadoras, $montadora);
        }
        return $montadoras;
    }
}

?>