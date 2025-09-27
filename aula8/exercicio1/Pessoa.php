<?php

class Pessoa{

    private string $nome;
    private string $sobrenome;

    public function nomeCompleto(){
        $nomeCompleto = $this->nome. " " . $this->sobrenome;
        return $nomeCompleto;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }
    public function setSobrenome(string $sobrenome): self
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }
}