<?php

class Generales
{
    private string $nombre;
    private int $votos;
    private int $escanos;

    public function __construct(string $nombre,int $votos,int $escanos)
    {
        $this->nombre = $nombre;
        $this->votos = $votos;
        $this->escanos = $escanos;
    }


    public function getNombre()
    {
        return $this->nombre;
    }

    public function getVotos()
    {
        return $this->votos;
    }

    public function getEscanos()
    {
        return $this->escanos;
    }

    public function setEscanos($escanos)
    {
        $this->escanos = $escanos;
    }
    public function setVotos($votos)
    {
        $this->votos = $votos;
    }
}