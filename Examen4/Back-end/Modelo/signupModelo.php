<?php

include_once "../DB/db.php";

class signupModelo
{
    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }


    public function checkUser($user){
        $sql = 'select * from users where mail like "'.$user.'" ';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        if($query->num_rows > 0){
            return true;
        }
        return false;
    }

    public function insertUser($user,$password){
        $sql = 'insert into users (mail,password,apikey) values ("'.$user.'","'.$password.'",0);';
        $this->db->conexion();
        $this->db->query($sql);
        $this->db->close();
    }

}