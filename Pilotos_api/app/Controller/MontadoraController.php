<?php

include_once(__DIR__."/../dao/MontadoraDao.php");

class MontadoraController{
    
    private MontadoraDao $montadoraDao;

    public function __construct(){
        $this->montadoraDao = new MontadoraDao();
    }

    public function listar(){
        return $this->montadoraDao->list();
    }
}
?>