<?php

class Provincia{

    private string $nombre;
    private string $partido;
    private int $votos;
    private int $escanos;

    public function __construct(string $nombre, string $partido, int $votos,int $escanos)
    {
        $this->nombre = $nombre;
        $this->partido = $partido;
        $this->votos = $votos;
        $this->escanos = $escanos;
    }


    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPartido()
    {
        return $this->partido;
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