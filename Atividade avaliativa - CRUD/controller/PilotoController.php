<?php

include_once(__DIR__."/../dao/PilotoDao.php");
include_once(__DIR__."/../sevice/PilotoService.php");

class PilotoController {
   
    private PilotoDao $pilotoDao;
    private PilotoService $pilotoService;

    public function __construct() {
        $this->pilotoDao = new PilotoDao();
        $this->pilotoService = new PilotoService();
    }

    public function inserir(Piloto $piloto){
        $erros = $this->pilotoService->validar($piloto);
        if(! $erros)
            $this->pilotoDao->insert($piloto);
        return $erros;
    }

    public function editar(Piloto $piloto){
        $erros = $this->pilotoService->validar($piloto);
        if(! $erros)
            $this->pilotoDao->update($piloto);
        return $erros;
    }

    public function buscarPorId(int $id){
        return $this->pilotoDao->findById($id);
    }

    public function listar(){
        return $this->pilotoDao->list();
    }

    public function excluir(int $id){
        $this->pilotoDao->delete($id);
    }
}
?>