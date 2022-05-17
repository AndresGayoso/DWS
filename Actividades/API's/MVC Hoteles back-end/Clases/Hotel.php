<?php

class Hotel
{
   public int $id;
   public string $nombre;
   public string $ubicacion;
   public string $calle;
   public int $estrellas;
   public float $latitud;
   public float $longitud;
   public float $calificacion;
   public string $hora_entrada;
   public string $hora_salida;
   public string $telefono;
   public string $descripcion;
   public array $imagenes;
   public array $habitaciones;

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