<?php

class Pelicula
{
    private $id, $nombre, $duracion, $director, $rating, $estreno, $edad_min;

    public function __construct($id, $nombre, $duracion, $director, $rating, $estreno, $edad_min)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->duracion = $duracion;
        $this->director = $director;
        $this->rating = $rating;
        $this->estreno = $estreno;
        $this->edad_min = $edad_min;
        $this->portada = "";
        $this->Actores = [];
        $this->Categorias = [];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function getDirector()
    {
        return $this->director;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getEstreno()
    {
        return $this->estreno;
    }

    public function getEdadMin()
    {
        return $this->edad_min;
    }

    public function getActores(): array
    {
        return $this->Actores;
    }

    public function setActores(array $Actores): void
    {
        $this->Actores = $Actores;
    }

    public function getCategorias(): array
    {
        return $this->Categorias;
    }

    public function setCategorias(array $Categorias): void
    {
        $this->Categorias = $Categorias;
    }

    public function getPortada(): string
    {
        return $this->portada;
    }

    public function setPortada(string $portada): void
    {
        $this->portada = $portada;
    }



}