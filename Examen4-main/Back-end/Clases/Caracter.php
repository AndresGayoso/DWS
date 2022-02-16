<?php

class Caracter
{
    public int $id;
    public string $name;
    public string $status;
    public string $species;
    public string $type;
    public string $gender;
    public string $origin;
    public string $location;
    public string $created;
    public array $episodios;

    /**
     * @param int $id
     * @param string $name
     * @param string $status
     * @param string $species
     * @param string $type
     * @param string $gender
     * @param string $origin
     * @param string $location
     * @param string $created
     */
    public function __construct(int $id, string $name, string $status, string $species, string $type, string $gender, string $origin, string $location, string $created,array $episodios)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->species = $species;
        $this->type = $type;
        $this->gender = $gender;
        $this->origin = $origin;
        $this->location = $location;
        $this->created = $created;
        $this->episodios = $episodios;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getSpecies(): string
    {
        return $this->species;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }


}