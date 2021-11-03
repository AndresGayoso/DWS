<?php

class Partido{

    private string $nombre;
    private string $provincia;
    private int $votos;
    private int $escanos;

    public function __construct(string $nombre, string $provincia, int $votos)
    {
        $this->nombre = $nombre;
        $this->provincia = $provincia;
        $this->votos = $votos;
    }


    public function getNombre()
    {
        return $this->nombre;
    }

    public function getProvincia()
    {
        return $this->provincia;
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



}