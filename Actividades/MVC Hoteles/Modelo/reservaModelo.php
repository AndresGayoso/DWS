<?php

include_once "../DB/db.php";

class reservaModelo
{

    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }

    function comprobarReserva($entrada, $salida, $idHabitacion)
    {

        $sql = "select * from MVC_Reservas where id_habitacion=" . $idHabitacion . " and 
                Entrada between '" . $entrada . "' and '" . $salida . "' or
                Salida between '" . $entrada . "' and '" . $salida . "' or
                '" . $entrada . "' between Entrada and Salida";
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        if ($query->num_rows > 0) {
            return true;
        }
        return false;

    }

    function InsertarReserva($usuario,$id_habitacion,$entrada,$salida){

        $sql = 'insert into MVC_Reservas (id_usuario,id_habitacion,entrada,salida) values 
                ("'.$usuario.'","'.$id_habitacion.'","'.$entrada.'","'.$salida.'")';
        $this->db->conexion();
        $this->db->query($sql);
        $this->db->close();
    }


}