<?php

include_once(__DIR__."/../util/Connection.php");
include_once(__DIR__."/../model/Series.php");

class SeriesDao{
    private PDO $conn;

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function list(){
        $sql = "SELECT * FROM series ORDER BY nome";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    private function map(array $result){
        $competicao = array(); //se der erro verificar aqui, ex. cursos array e curso
        foreach($result as $r){
            $series = new Equipe();
            $series->setId($r['id']);
            $series->setNome($r['nome']);

            array_push($competicao, $series);
        }
        return $competicao;
    }
}

?>