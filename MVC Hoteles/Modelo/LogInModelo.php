<?php

include_once "../DB/db.php";

class LogIn
{
    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }

    public function CheckUser($user, $email, $password)
    {

        $sql = 'select * from MVC_Usuarios where usuario = "' . $user . '" or email = "' . $email . '"';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($result = $query->fetch_assoc()) {
            if(password_verify($password,$result["password"])){
                return true;
            }else{
                echo("
                <script>
                    window.alert('El usuario/email o contraseña no son correctas');
                </script>
                ");
            }
        } else {
            echo("
            <script>
                window.alert('El usuario/email o contraseña no son correctas');
            </script>
            ");
        }

    }
}