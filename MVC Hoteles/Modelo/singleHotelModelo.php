<?php

include_once "../DB/db.php";
include_once "../Clases/Hotel.php";
include_once "../Clases/Images.php";

class singleHotel{

    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }

    public function getImagenes($HotelId){

        $sql = 'select * from MVC_Multimedia where id_hotel = "'.$HotelId.'"';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $resultado = array();
        while ($row = $query->fetch_assoc()){
            $resultado[] = new Images($row["id"],$row["id_hotel"],$row["url"]);
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
                        $row["hora_salida"],$row["telefono"],$row["descripcion"],$this->getImagenes($row["id"]));
    }






}