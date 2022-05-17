<?php

include_once "../DB/db.php";
include_once "../Clases/Caracter.php";
include_once "../Clases/Episodio.php";
include_once  "../Clases/Location.php";

class listaPersonages
{
    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }

    public function getEpisodes($id){
        $sql = 'select e.id,e.name from episodes_characters ec
                inner join episodes e on ec.episode_id = e.id
                where ec.character_id = "'.$id.'";';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while($row = $query->fetch_assoc()){
            $return[] = new Episodio($row["id"],$row["name"]);
        }
        return $return;
    }

    public function getPersonages(){
        $sql = 'select c.id,c.name,c.status,c.species,c.type,c.gender,l.name as "origin",lo.name as "location",c.created from characters c
                inner join locations l on l.id = c.origin
                inner join locations lo on lo.id = c.location
                ORDER BY RAND(1234) LIMIT 20;';
        $this->db->conexion();
        $query=$this->db->query($sql);
        $this->db->close();
        $return = array();
        while($row = $query->fetch_assoc()){
            if ($row["type"] == ""){
                $row["type"] = "unknown";
             }
            if(is_null($row["gender"])){
                $row["gender"] = "unknown";
            }
            $return[] = new Caracter($row["id"],$row["name"],$row["status"],$row["species"],$row["type"],$row["gender"],$row["origin"],$row["location"],$row["created"],$this->getEpisodes($row["id"]));
        }
        return $return;
    }

    public function getAllLocations(){
        $sql = 'SELECT id,name from locations;';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $return = array();
        while($row = $query->fetch_assoc()){
            $return[] = new Location($row["id"],$row["name"]);
        }
        return $return;
    }

    public function changeLocation($user,$location){
        $sql = 'update characters set location = "'.$location.'" where id = "'.$user.'"';
        $this->db->conexion();
        $this->db->query($sql);
        $this->db->close();
    }
}