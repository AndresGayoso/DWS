<?php

include_once "../DB/db.php";
include_once "../Clases/Hotel.php";
include_once "../Clases/Images.php";
include_once "../Clases/Habitacion.php";

class singleHotel{

    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }

    public function getImagenesHotel($HotelId){

        $sql = 'select * from MVC_Multimedia where type like "hotel" and id_fk = "'.$HotelId.'"';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $resultado = array();
        while ($row = $query->fetch_assoc()){
            $resultado[] = new Images($row["id"],$row["id_fk"],$row["url"]);
        }
        return $resultado;
    }

    public function getImagenesHabitacion($HabitacionId){

        $sql = 'select * from MVC_Multimedia where type like "habitacion" and id_fk = "'.$HabitacionId.'"';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $resultado = array();
        while ($row = $query->fetch_assoc()){
            $resultado[] = new Images($row["id"],$row["id_fk"],$row["url"]);
        }
        return $resultado;
    }


    public function getHotel($id){
        $sql = 'select * from MVC_Hoteles where id = "'.$id.'"';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $row = $query->fetch_assoc();
        return new Hotel($row["id"],$row["nombre"],$row["ciudad"],$row["calle"],$row["estrellas"],
                        $row["latitud"],$row["longitud"],$row["calificacion"],$row["hora_entrada"],
                        $row["hora_salida"],$row["telefono"],$row["descripcion"],$this->getImagenesHotel($row["id"]));
    }

    public function getHabitaciones($id){
        $sql = 'SELECT id,nombre,num_personas,precio FROM MVC_Habitaciones
                where id_hotel = "'.$id.'";';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $resultado = array();
        while ($row = $query->fetch_assoc()){
            $resultado[] = new Habitacion ($row["id"],$row["nombre"],$row["num_personas"],$row["precio"],$this->getImagenesHabitacion($row["id"]));
        }
        return $resultado;
    }

}