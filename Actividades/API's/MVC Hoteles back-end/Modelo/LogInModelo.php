<?php

include_once "../DB/db.php";
include_once "../Clases/Usuario.php";

class LogIn
{
    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }

    public function CheckUser($texto, $password)
    {
        $sql = 'select * from MVC_Usuarios where usuario = "' . $texto . '" or email = "' . $texto . '"';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($result = $query->fetch_assoc()) {
            if(password_verify($password,$result["password"])){
                return new Usuario($result["id"],$result["usuario"],$result["email"]);
            }
        }
        return new Usuario(0,"-","-");
    }
}