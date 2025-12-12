<?php

namespace App\Mapper;

use App\Model\Piloto;
use App\Model\Equipe;
use App\Model\Montadora;
use App\Model\Series;

class PilotoMapper {

    public function mapFromDatabaseArrayToObjectArray($regArray) {
        $arrayObj = array();

        foreach($regArray as $reg) {
            $regObj = $this->mapFromDatabaseToObject($reg);
            array_push($arrayObj, $regObj); 
        }

        return $arrayObj;
    }

    public function mapFromDatabaseToObject($regDatabase) {
        $obj = new Piloto();
        if(isset($regDatabase['id'])) 
            $obj->setId($regDatabase['id']);
        
        if(isset($regDatabase['nome']))
            $obj->setNome($regDatabase['nome']);

        if(isset($regDatabase['idade']))
            $obj->setIdade($regDatabase['idade']);
        
        if(isset($regDatabase['id_equipe'])) {
            $equipe = new Equipe();
            $equipe->setId( (int) $regDatabase['id_equipe']);
            
            if(isset($regDatabase['nome_equipe'])) {
                $equipe->setNome($regDatabase['nome_equipe']);
            }
            $obj->setEquipe($equipe);
        }

        if(isset($regDatabase['id_montadora'])) {
            $montadora = new Montadora();
            $montadora->setId( (int) $regDatabase['id_montadora']);
            
            if(isset($regDatabase['nome_montadora'])) {
                $montadora->setNome($regDatabase['nome_montadora']);
            }
            $obj->setMontadora($montadora);
        }

        if(isset($regDatabase['id_series'])) {
            $series = new Series();
            $series->setId( (int) $regDatabase['id_series']);
            
            if(isset($regDatabase['nome_series'])) {
                $series->setNome($regDatabase['nome_series']);
            }
            $obj->setSeries($series);
        }

        if(isset($regDatabase['vitorias']))
            $obj->setVitorias($regDatabase['vitorias']);
        
    return $obj;
    }

    
    public function mapFromJsonToObject($regJson) {
        return $this->mapFromDatabaseToObject($regJson);
    }

}