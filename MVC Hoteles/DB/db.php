<?php

class db extends mysqli{

    protected string $servername = "sql480.main-hosting.eu";
    protected string $username = "u850300514_agayoso";
    protected string $password = "x45188189C";
    protected string $database = "u850300514_agayoso";

    /**
     * @param $servername
     * @param $username
     * @param $password
     * @param $database
     */

    public function local()
    {
        parent::__construct($this->servername, $this->username, $this->password, $this->database);

        if (mysqli_connect_error()) {
            die("ERROR DATABASE: " . mysqli_connect_error());
        }
    }


}