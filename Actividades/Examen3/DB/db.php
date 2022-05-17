<?php

class db extends mysqli{

    protected string $servername = "localhost";
    protected string $username = "root";
    protected string $password = "root";
    protected string $database = "Examen3";

    /**
     * @param $servername
     * @param $username
     * @param $password
     * @param $database
     */

    public function conexion(){
        $this->conectar();
    }

    public function conectar()
    {
        parent::__construct($this->servername, $this->username, $this->password, $this->database);

        if (mysqli_connect_error()) {
            die("ERROR DATABASE: " . mysqli_connect_error());
        }
    }

}