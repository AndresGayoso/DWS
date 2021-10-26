<?php

class PartidoPolitico{

    private $nombre;
    private $provincia;
    private $votos;
    private $escanos;

    function __constructor($nombre,$provincia,$votos,$escanos){

        $this->nombre=$nombre;
        $this->provincia=$provincia;
        $this->votos=$votos;
        $this->escanos=$escanos;

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

    public function setVotos($votos)
    {
        $this->votos = $votos;
    }

    public function setEscanos($escanos)
    {
        $this->escanos = $escanos;
    }



}