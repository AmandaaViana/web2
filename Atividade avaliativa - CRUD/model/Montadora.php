<?php
 
class Montadora{
    private ?int $id;
    private ?string $nome;

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
}
?>