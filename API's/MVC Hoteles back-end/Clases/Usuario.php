<?php

class Usuario
{
     public int $id;
     public string $usuario;
     public string $email;

    /**
     * @param int $id
     * @param string $usuario
     * @param string $email
     */
    public function __construct(int $id, string $usuario, string $email)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->email = $email;
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
    public function getUsuario(): string
    {
        return $this->usuario;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }





}