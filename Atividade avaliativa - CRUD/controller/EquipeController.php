<?php 

include_once(__DIR__."/../dao/EquipeDao.php");

class EquipeController{

    private EquipeDao $equipeDao;

    public function __construct(){
        $this->equipeDao = new EquipeDao();
    }

    public function listar(){
        return $this->equipeDao->list();
    }
}
?>