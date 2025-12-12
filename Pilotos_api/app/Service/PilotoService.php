<?php 

namespace App\Service;

use App\Model\Piloto;

class PilotoService{
    public function validar(Piloto $piloto){
    
        if(! $piloto->getNome())
            return "O campo nome é obrigatório.";

        if(! $piloto->getIdade())
            return "O campo idade é obrigatório.";

        if(! $piloto->getEquipe() || ! $piloto->getEquipe()->getId()) {
             return "O campo equipe é obrigatório.";
        }
        
        if(! $piloto->getMontadora() || ! $piloto->getMontadora()->getId()) {
             return "O campo montadora é obrigatório.";
        }

        if(! $piloto->getSeries() || ! $piloto->getSeries()->getId()) {
             return "O campo series  é obrigatório.";
        }

        if (is_null($piloto->getVitorias()) || $piloto->getVitorias() < 0) { //a ausencia de valor sera null
            return "O campo vitorias é obrigatório e não pode ser negativo.";
        }
        
        
        return null;
    }
}

?>