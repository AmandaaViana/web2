<?php

include_once(__DIR__."/../model/Piloto.php");
include_once(__DIR__."/../util/Connection.php");

class PilotoDao{

    private PDO $conn;

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function insert(Piloto $piloto){
        try{
            $sql = "INSERT INTO piloto (nome, idade, id_equipe, id_montadora, id_series) 
                    VALUES (?, ?, ?, ?, ?)";
            
            $stm = $this->conn->prepare($sql);
            $stm->execute(array($piloto->getNome(),
                                $piloto->getIdade(),
                                $piloto->getEquipe()->getId(),
                                $piloto->getMontadora()->getId(),
                                $piloto->getSeries()->getId()));          
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function update(Piloto $piloto){
        try{
            $sql = "UPDATE piloto
                    SET nome = ?, idade = ?, id_equipe = ?, id_montadora = ?, id_series = ?
                    WHERE id = ?";
            $stm = $this->conn->prepare($sql);
            $stm->execute(array($piloto->getNome(),
                                $piloto->getIdade(),
                                $piloto->getEquipe()->getId(),
                                $piloto->getMontadora()->getId(),
                                $piloto->getSeries()->getId(),
                                $piloto->getId()));
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function findById(int $id){
        $sql = "SELECT p.*, 
                       e.nome AS nome_equipe, 
                       m.nome AS nome_montadora, 
                       s.nome AS nome_series
                FROM piloto p
                JOIN equipe e ON (e.id = p.id_equipe)
                JOIN montadora m ON (m.id = p.id_montadora)
                JOIN series s ON (s.id = p.id_series)
                WHERE p.id = ?";
        $stm = $this->conn->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $pilotos = $this->map($result);

        if(count($pilotos) == 1)
            return $pilotos[0];
        return NULL;
    }

    public function list(){
        $sql = "SELECT p.*, 
                       e.nome AS nome_equipe, 
                       m.nome AS nome_montadora, 
                       s.nome AS nome_series
                FROM piloto p
                JOIN equipe e ON (e.id = p.id_equipe)
                JOIN montadora m ON (m.id = p.id_montadora)
                JOIN series s ON (s.id = p.id_series)";
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    public function delete(int $id){
        try{
        $sql = "DELETE FROM piloto WHERE id = ?";

        $stm = $this->conn->prepare($sql);
        $stm->execute(array($id));
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    //converte array pr objeto
    private function map(array $result){
        $pilotos = array();

        foreach($result as $r){
            $piloto = new Piloto();
            $piloto->setId($r['id']);
            $piloto->setNome($r['nome']);
            $piloto->setIdade($r['idade']);

            $equipe = new Equipe();
            $equipe->setId($r['id_equipe']);
            $equipe->setNome($r['nome_equipe']);//se der erro olhar aqui
            $piloto->setEquipe($equipe);

            $montadora = new Montadora();
            $montadora->setId($r['id_montadora']);
            $montadora->setNome($r['nome_montadora']);
            $piloto->setMontadora($montadora);

            $series = new Series();
            $series->setId($r['id_series']);
            $series->setNome($r['nome_series']);
            $piloto->setSeries($series);

            array_push($pilotos,$piloto);
        }
        return $pilotos;
    }
}
?>