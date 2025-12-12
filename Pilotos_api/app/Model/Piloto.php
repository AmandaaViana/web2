<?php 

namespace App\Model;

use App\Model\Equipe;
use App\Model\Montadora;
use App\Model\Series;

use \JsonSerializable;

class Piloto implements JsonSerializable{
    private ?int $id;  //com o ? pode ser null
    private ?string $nome;
    private ?int $idade;
    private ?Equipe $equipe;
    private ?Montadora $montadora;
    private ?Series $series;
    private ?int $vitorias;

    public function __construct() {
        $this->id = 0;
        $this->nome = null;
        $this->idade = null;
        $this->equipe = new Equipe();
        $this->montadora = new Montadora();
        $this->series = new Series();
        $this->vitorias = 0;
    }

    public function jsonSerialize(): array {
        return array(
            "id" => $this->id,
            "nome" => $this->nome,
            "idade" => $this->idade,
            "equipe" => $this->equipe, 
            "montadora" => $this->montadora,
            "series" => $this->series,
            "vitorias" => $this->vitorias
    );
}

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of idade
     */
    public function getIdade(): ?int
    {
        return $this->idade;
    }

    /**
     * Set the value of idade
     */
    public function setIdade(?int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    /**
     * Get the value of equipe
     */
    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    /**
     * Set the value of equipe
     */
    public function setEquipe(?Equipe $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }

    /**
     * Get the value of montadora
     */
    public function getMontadora(): ?Montadora
    {
        return $this->montadora;
    }

    /**
     * Set the value of montadora
     */
    public function setMontadora(?Montadora $montadora): self
    {
        $this->montadora = $montadora;

        return $this;
    }

    /**
     * Get the value of series
     */
    public function getSeries(): ?Series
    {
        return $this->series;
    }

    /**
     * Set the value of series
     */
    public function setSeries(?Series $series): self
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get the value of vitorias
     */
    public function getVitorias(): ?int
    {
        return $this->vitorias;
    }

    /**
     * Set the value of vitorias
     */
    public function setVitorias(?int $vitorias): self
    {
        $this->vitorias = $vitorias;

        return $this;
    }
}

?>