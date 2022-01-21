<?php

include_once ("../Clases/Hotel.php");
include_once ("../Clases/Images.php");
include_once ("../DB/db.php");

class listaModelo
{
    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }

    public function getImagenesHotel($hotelID){

        $sql = 'SELECT * from MVC_Multimedia where type like "hotel" and id_hotel = "'.$hotelID.'";';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $resultado = array();
        while($row = $query->fetch_assoc()){
            $resultado[]= new Images($row["id"],$row["id_hotel"],$row["url"]);
        }
        return $resultado;
    }

    public function getHotel($hotelID){
        $sql = 'Select * from MVC_Hoteles where id = "'.$hotelID.'";';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $row = $query->fetch_assoc();
        $resultado = new Hotel($row["id"],$row["nombre"],$row["ciudad"],$row["calle"],$row["estrellas"],
            $row["latitud"],$row["longitud"],$row["calificacion"],$row["hora_entrada"],$row["hora_salida"],
            $row["telefono"],$row["descripcion"],$this->getImagenesHotel($row["id"]));

        return $resultado;
    }

    public function getHoteles()
    {
        $sql = "SELECT * from MVC_Hoteles;";
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $resultado = array();
        while ($row = $query->fetch_assoc()){
            $resultado[] = new Hotel($row["id"],$row["nombre"],$row["ciudad"],$row["calle"],$row["estrellas"],
            $row["latitud"],$row["longitud"],$row["calificacion"],$row["hora_entrada"],$row["hora_salida"],
            $row["telefono"],$row["descripcion"],$this->getImagenesHotel($row["id"]));
        }
        return $resultado;
    }

}