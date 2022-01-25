<?php

class Usuario
{
     private int $id;
     private string $usuario;
     private string $email;

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