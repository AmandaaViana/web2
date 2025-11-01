<?php

class Curso {
    //atributos
    private ?int $id; //com o ? pode ser null
    private ?string $nome;
    private ?string $turno;

    //metodos
    public function getTurnoDesc(){
        if($this->turno == 'N')
            return "Noturno";
        elseif ($this->turno == 'M')
            return "Matutino";
        elseif ($this->turno == 'V')
            return "Vespertino";
    }

    public function getNomeTurno(){
        return $this->nome . " - " . $this->getTurnoDesc();
    }
    //GETs e SETs
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    
    public function getNome(): ?string
    {
        return $this->nome;
    }
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

   
    public function getTurno(): ?string
    {
        return $this->turno;
    }
    public function setTurno(?string $turno): self
    {
        $this->turno = $turno;

        return $this;
    }
}

?>