<?php

class Usuario{

    public int $id;
    public string $username;
    public string $email;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUsername(): int
    {
        return $this->username;
    }

    /**
     * @return int
     */
    public function getEmail(): int
    {
        return $this->email;
    }


}
