<?php

class Countries
{

    public string $code;
    public string $name;
    public int $population;
    public int $gnp;
    public int $numLanguages;
    public int $numcities;
    public string $owner;

    /**
     * @param string $code
     * @param string $name
     * @param int $population
     * @param int $gnp
     * @param int $numLanguages
     * @param int $numcities
     * @param string $owner;
     */
    public function __construct(string $code, string $name, int $population, int $gnp, int $numLanguages, int $numcities, string $owner)
    {
        $this->code = $code;
        $this->name = $name;
        $this->population = $population;
        $this->gnp = $gnp;
        $this->numLanguages = $numLanguages;
        $this->numcities = $numcities;
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPopulation(): int
    {
        return $this->population;
    }

    /**
     * @return int
     */
    public function getGnp(): int
    {
        return $this->gnp;
    }

    /**
     * @return int
     */
    public function getNumLanguages(): int
    {
        return $this->numLanguages;
    }

    /**
     * @return int
     */
    public function getNumcities(): int
    {
        return $this->numcities;
    }

    /**
     * @return int
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * @param int $owner
     */
    public function setOwner(string $owner): void
    {
        $this->owner = $owner;
    }


}