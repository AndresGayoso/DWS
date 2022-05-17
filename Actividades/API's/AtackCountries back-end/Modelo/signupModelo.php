<?php

include_once "../DB/db.php";

class signupModelo
{

    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }

    public function checkUser($mail)
    {
        $sql = "SELECT * FROM users WHERE Mail = '" . $mail . "';";
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($query->num_rows == 0) {
            return false;
        }
        return true;
    }

    public function insertUser($mail, $password)
    {
        $sql = 'insert into users (Mail,Password) values ("' . $mail . '","' . $password . '")';
        $this->db->conexion();
        if ($this->db->query($sql)) {
            $this->db->close();
            return true;
        }
        $this->db->close();
        return false;
    }

    public function getUser($mail){
        $sql = "SELECT Id FROM users WHERE Mail = '" . $mail . "';";
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $row = $query->fetch_assoc();
        return $row["Id"];
    }

    public function RandomCountry($userId)
    {
        $random = 'SELECT Code FROM countries ORDER BY RAND() LIMIT 1;';
        $this->db->conexion();
        $query = $this->db->query($random);
        $row = $query->fetch_assoc();
        $sql = 'update countries set UserId = "'.$userId.'" where Code = "'.$row["Code"].'";';
        if($query2 = $this->db->query($sql) == false){
            echo "fallo random";
        }
        $this->db->close();

    }

}