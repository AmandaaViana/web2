<?php

class Livro{
    private string $titulo;
    private string $autor;
    private string $genero;
    private int $paginas;

    

    public function getTitulo(): string
    {
        return $this->titulo;
    }
    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }
    public function setAutor(string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }
    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getPaginas(): int
    {
        return $this->paginas;
    }
    public function setPaginas(int $paginas): self
    {
        $this->paginas = $paginas;

        return $this;
    }
}