<?php

include_once(__DIR__."/../dao/SeriesDao.php");

class SeriesController{
    
    private SeriesDao $seriesDao;

    public function __construct(){
        $this->seriesDao = new SeriesDao();
    }

    public function listar(){
        return $this->seriesDao->list();
    }
}
?>