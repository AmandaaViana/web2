<?php

namespace App\Dao;

use App\Util\Connection;
use App\Mapper\PilotoMapper;
use App\Model\Piloto;

use \Exception;

class PilotoDao{

    private $conn;
    private $pilotoMapper;

    public function __construct(){
        $this->conn = Connection::getConnection();
        $this->pilotoMapper = new PilotoMapper();
    }

    public function insert(Piloto $piloto){
        $sql = "INSERT INTO piloto (nome, idade, id_equipe, id_montadora, id_series, vitorias) 
                    VALUES (:nome, :idade, :id_equipe, :id_montadora, :id_series, :vitorias)";
            
        $stm = $this->conn->prepare($sql);
        $stm->bindValue("nome", $piloto->getNome());
        $stm->bindValue("idade", $piloto->getIdade());
        $stm->bindValue("id_equipe", $piloto->getEquipe()->getId());     
        $stm->bindValue("id_montadora", $piloto->getMontadora()->getId()); 
        $stm->bindValue("id_series", $piloto->getSeries()->getId());
        $stm->bindValue("vitorias",$piloto->getVitorias()); 
        $stm->execute();        
        
        $id = $this->conn->lastInsertId();
        $piloto->setId($id);
        return $piloto;
    }

    public function update(Piloto $piloto){
        $sql = "UPDATE piloto
                SET nome = :nome, idade = :idade, id_equipe = :id_equipe, id_montadora = :id_montadora, id_series = :id_series,vitorias = :vitorias
                WHERE id = :id";

        $stm = $this->conn->prepare($sql);
        $stm->bindValue("nome", $piloto->getNome());
        $stm->bindValue("idade", $piloto->getIdade());
        $stm->bindValue("id_equipe", $piloto->getEquipe()->getId());     
        $stm->bindValue("id_montadora", $piloto->getMontadora()->getId()); 
        $stm->bindValue("id_series", $piloto->getSeries()->getId());
        $stm->bindValue("vitorias",$piloto->getVitorias());
        $stm->bindValue("id", $piloto->getId());
        $stm->execute();  

        return $piloto;   
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
                WHERE p.id = :id";

        $stm = $this->conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
        $result = $stm->fetchAll();

        $arrayObj = $this->pilotoMapper->mapFromDatabaseArrayToObjectArray($result);

        if(count($arrayObj) == 0)
            return null;
        else if(count($arrayObj) > 1)
            throw new Exception("Mais de um registro encontrado para o ID " . $id); //throw exceçao mas nao lança
        else 
            return $arrayObj[0];
    }

    public function list(){
        $sql = "SELECT p.*, 
                       e.nome AS nome_equipe, 
                       m.nome AS nome_montadora, 
                       s.nome AS nome_series
                FROM piloto p
                JOIN equipe e ON (e.id = p.id_equipe)
                JOIN montadora m ON (m.id = p.id_montadora)
                JOIN series s ON (s.id = p.id_series)
                ORDER BY id";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->pilotoMapper->mapFromDatabaseArrayToObjectArray($result);
    }

    public function delete(int $id){
        $sql = "DELETE FROM piloto WHERE id = :id";

        $stm = $this->conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
       
    }

}
?>