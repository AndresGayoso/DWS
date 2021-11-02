<?php

class Partido{

    public string $nombre;
    public string $provincia;
    public int $votos;
    public int $escanos;

    /**
     * @param string $nombre
     * @param string $provincia
     * @param int $votos
     */
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