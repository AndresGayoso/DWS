<?php

class Habitacion
{
    public int $id;
    public string $nombre;
    public int $personas;
    public int $precio;
    public array $imagenes;

    /**
     * @param int $id
     * @param string $nombre
     * @param int $personas
     * @param int $precio
     * @param array $imagenes
     */
    public function __construct(int $id, string $nombre, int $personas, int $precio, array $imagenes)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->personas = $personas;
        $this->precio = $precio;
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
    public function getPersonas(): int
    {
        return $this->personas;
    }

    /**
     * @return int
     */
    public function getPrecio(): int
    {
        return $this->precio;
    }

    /**
     * @return array
     */
    public function getImagenes(): array
    {
        return $this->imagenes;
    }

}