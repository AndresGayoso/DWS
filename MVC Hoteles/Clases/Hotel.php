<?php

class Hotel
{
    private int $id;
    private string $nombre;
    private string $ubicacion;
    private string $calle;
    private int $estrellas;
    private float $latitud;
    private float $longitud;
    private float $calificacion;
    private string $hora_entrada;
    private string $hora_salida;
    private string $telefono;
    private string $descripcion;
    private array $imagenes;
    private array $habitaciones;

    /**
     * @param $id
     * @param $nombre
     * @param $ubicacion
     * @param $calle
     * @param $estrellas
     * @param $latitud
     * @param $longitud
     * @param $calificacion
     * @param $hora_entrada
     * @param $hora_salida
     * @param $telefono
     * @param $descripcion
     */
    public function __construct($id, $nombre, $ubicacion, $calle, $estrellas, $latitud, $longitud, $calificacion, $hora_entrada, $hora_salida, $telefono, $descripcion,$imagenes)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ubicacion = $ubicacion;
        $this->calle = $calle;
        $this->estrellas = $estrellas;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
        $this->calificacion = $calificacion;
        $this->hora_entrada = $hora_entrada;
        $this->hora_salida = $hora_salida;
        $this->telefono = $telefono;
        $this->descripcion = $descripcion;
        $this->imagenes = $imagenes;
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
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @return array
     */
    public function getImagenes(): array
    {
        return $this->imagenes;
    }

    /**
     * @return array
     */
    public function getHabitaciones(): array
    {
        return $this->habitaciones;
    }

    /**
     * @param array $habitaciones
     */
    public function setHabitaciones(array $habitaciones): void
    {
        $this->habitaciones = $habitaciones;
    }


}