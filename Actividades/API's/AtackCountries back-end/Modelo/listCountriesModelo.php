<?php

include_once "../DB/db.php";
include_once "../Clases/Countries.php";

class listCountriesModelo
{
    private db $db;

    public function __construct()
    {
        $this->db = new db();
    }

    public function getUser($userId){
        $sql = "SELECT Mail FROM users WHERE Id = '" . $userId . "';";
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $row = $query->fetch_assoc();
        if($row["Mail"] == null){
            return "-";
        }else{
            return $row["Mail"];
        }

    }

    public function getCountries($userId){
        $sql = 'SELECT co.Code as "code",co.Name as "name",co.Population as "population",co.GNP as "gnp",(select count(Language) from countrylanguages col where col.CountryCode = co.Code) as "numLanguages",(select count(ID) from cities ci where ci.CountryCode = co.Code) as "numcities",UserId 
                from countries co
                where UserId != "'.$userId.'" or UserId is Null
                group by co.Code;';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $resultado = array();
        while($row = $query->fetch_assoc()){
            $resultado[] = new Countries($row["code"],$row["name"],$row["population"],$row["gnp"],$row["numLanguages"],$row["numcities"],$this->getUser($row["UserId"]));
        }
        return $resultado;
    }

    public function getUserCountries($userId){
        $sql = 'SELECT co.Code as "code",co.Name as "name",co.Population as "population",co.GNP as "gnp",(select count(Language) from countrylanguages col where col.CountryCode = co.Code) as "numLanguages",(select count(ID) from cities ci where ci.CountryCode = co.Code) as "numcities",UserId 
                from countries co
                where UserId = "'.$userId.'"
                group by co.Code;';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $resultado = array();
        while($row = $query->fetch_assoc()){
            $resultado[] = new Countries($row["code"],$row["name"],$row["population"],$row["gnp"],$row["numLanguages"],$row["numcities"],$this->getUser($row["UserId"]));
        }
        return $resultado;
    }

    public function getUserPower($userId){
        $sql = 'Select sum(Population+GNP) as power from countries where UserId = "'.$userId.'"';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $row = $query->fetch_assoc();
        return $row["power"];
    }
    public function getCountryPower($code){
        $sql = 'Select sum(Population+GNP) as power from countries where Code = "'.$code.'"';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
        $row = $query->fetch_assoc();
        return $row["power"];
    }

    public function UpdateCountryOwner($userId,$code){
        $sql = 'update countries set UserId = "'.$userId.'" where Code = "'.$code.'"';
        $this->db->conexion();
        $query = $this->db->query($sql);
        $this->db->close();
    }

}