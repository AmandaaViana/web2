<?php

include_once(__DIR__."/../util/Connection.php");
include_once(__DIR__."/../model/Equipe.php");

class EquipeDao{
    private PDO $conn;

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function list(){
        $sql = "SELECT * FROM equipe ORDER BY nome";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    private function map(array $result){
        $equipes = array();
        foreach($result as $r){
            $equipe = new Equipe();
            $equipe->setId($r['id']);
            $equipe->setNome($r['nome']);

            array_push($equipes, $equipe);
        }
        return $equipes;
    }
}

?>