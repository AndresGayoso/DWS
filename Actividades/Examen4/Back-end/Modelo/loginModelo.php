<?php

include_once "../DB/db.php";
include_once "../Clases/Usuario.php";

class loginModelo
{
    private db $db;

    /**
     * @param db $db
     */
    public function __construct()
    {
        $this->db = new db();
    }

    public function CheckUser($mail, $password)
    {
        $sql = 'select * from users where mail = "'.$mail.'"';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($row = $query->fetch_assoc()) {
            if (password_verify($password, $row["password"])) {
                return new Usuario($row["id"], $row["mail"]);
            }
        }
        return new Usuario(0,"-");
    }

}