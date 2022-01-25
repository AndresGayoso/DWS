<?php

include_once "../DB/db.php";

class SignUp
{
    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }

    public function insertUser($user,$mail,$password){

        $sql = 'insert into MVC_Usuarios (usuario,email,password) values ("'.$user.'","'.$mail.'","'.$password.'")';
        $this->db->conexion();
        if($this->db->query($sql)){
            $this->db->close();
            return true;
        }
        $this->db->close();
        return false;
    }
}