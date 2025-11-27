<?php 

include_once(__DIR__."/Equipe.php");
include_once(__DIR__."/Montadora.php");
include_once(__DIR__."/Series.php");

class Piloto{
    private ?int $id;  //com o ? pode ser null
    private ?string $nome;
    private ?int $idade;
    private ?Equipe $equipe;
    private ?Montadora $montadora;
    private ?Series $series;

    //GETs e SETs ID
    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    //GETs e SETs NOME
    public function getNome(): ?string
    {
        return $this->nome;
    }
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    //GETs e SETs IDADE
    public function getIdade(): ?int
    {
        return $this->idade;
    }
    public function setIdade(?int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    //GETs e SETs EQUIPE
    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }
    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    //GETs e SETs MONTADORA
    public function getMontadora(): ?Montadora
    {
        return $this->montadora;
    }
    public function setMontadora(?Montadora $montadora): self
    {
        $this->montadora = $montadora;

        return $this;
    }

    //GETs e SETs SERIES
    public function getSeries(): ?Series
    {
        return $this->series;
    }
    public function setSeries(?Series $series): self
    {
        $this->series = $series;

        return $this;
    }
}
?>