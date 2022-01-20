<?php

require_once ("../Clases/Hotel.php");
require_once ("../DB/db.php");

class listaModelo
{
    private db $db;

    public function __construct()
    {
        $this->db = new db();
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
            $row["telefono"],$row["descripcion"]);
        }
        return $resultado;
    }

    public function getImagenes(){

    }

}


$h = new listaModelo();
echo "<pre>";
var_dump($h->getHoteles());
echo "</pre>";