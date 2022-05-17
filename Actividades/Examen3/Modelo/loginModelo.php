<?php

include_once "../DB/db.php";
include_once "../Clases/Usuario.php";


class loginModelo
{

    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }

    public function CheckUser($mail, $password)
    {
        $sql = 'select * from users where Mail = "'.$mail.'"';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($row = $query->fetch_assoc()) {
            if (password_verify($password, $row["Password"])) {
                return new Usuario($row["Id"], $row["Mail"]);
            }
        }
        return new Usuario(0,"-");
    }
}