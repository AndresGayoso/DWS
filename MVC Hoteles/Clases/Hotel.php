<?php

class Hotel
{
    private int $id;
    private string $nombre;
    private int $estrellas;
    private string $ubicacion;
    private string $calle;
    private float $latitud;
    private float $longitud;
    private string $hora_entrada;
    private string $hora_salida;
    private float $calificacion;
    private string $telefono;
    private string $descricpcion;
    private $imagenes = [];

    /**
     * @param $id
     * @param $nombre
     * @param $estrellas
     * @param $ubicacion
     * @param $calle
     * @param $latitud
     * @param $longitud
     * @param $hora_entrada
     * @param $hora_salida
     * @param $calificacion
     * @param $telefono
     * @param $descricpcion
     */
    public function __construct($id, $nombre, $estrellas, $ubicacion, $calle, $latitud, $longitud, $hora_entrada, $hora_salida, $calificacion, $telefono, $descricpcion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->estrellas = $estrellas;
        $this->ubicacion = $ubicacion;
        $this->calle = $calle;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
        $this->hora_entrada = $hora_entrada;
        $this->hora_salida = $hora_salida;
        $this->calificacion = $calificacion;
        $this->telefono = $telefono;
        $this->descricpcion = $descricpcion;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @return int
     */
    public function getEstrellas(): int
    {
        return $this->estrellas;
    }

    /**
     * @return string
     */
    public function getUbicacion(): string
    {
        return $this->ubicacion;
    }

    /**
     * @return string
     */
    public function getCalle(): string
    {
        return $this->calle;
    }

    /**
     * @return float
     */
    public function getLatitud(): float
    {
        return $this->latitud;
    }

    /**
     * @return float
     */
    public function getLongitud(): float
    {
        return $this->longitud;
    }

    /**
     * @return string
     */
    public function getHoraEntrada(): string
    {
        return $this->hora_entrada;
    }

    /**
     * @return string
     */
    public function getHoraSalida(): string
    {
        return $this->hora_salida;
    }

    /**
     * @return float
     */
    public function getCalificacion(): float
    {
        return $this->calificacion;
    }

    /**
     * @return string
     */
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    /**
     * @return string
     */
    public function getDescricpcion(): string
    {
        return $this->descricpcion;
    }

    /**
     * @return array
     */
    public function getImagenes(): array
    {
        return $this->imagenes;
    }

    /**
     * @param array $imagenes
     */
    public function setImagenes(array $imagenes): void
    {
        $this->imagenes = $imagenes;
    }


}