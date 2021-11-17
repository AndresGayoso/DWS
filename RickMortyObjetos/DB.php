<?php
$servername = "sql480.main-hosting.eu";
$username = "u850300514_agayoso";
$password = "x45188189C";
$dbname = "u850300514_agayoso";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

function DatosCaracteres(){
    global $conn;

    $resultado = [];
    $sql = "SELECT * FROM Caracteres";
    $resultados = $conn->query($sql);

    for($i = 0; $row = $resultados->fetch_assoc();$i++){
        $resultado[$i]["id"] = $row["id"];
        $resultado[$i]["name"] = $row["name"];
        $resultado[$i]["status"] = $row["status"];
        $resultado[$i]["species"] = $row["species"];
        $resultado[$i]["type"] = $row["type"];
        $resultado[$i]["gender"] = $row["gender"];
        $resultado[$i]["origin"] = $row["origin"];
        $resultado[$i]["location"] = $row["location"];
        $resultado[$i]["image"] = $row["image"];
        $resultado[$i]["created"] = $row["created"];
    }

    $sql = "SELECT * FROM CharEpis";
    $resultados = $conn->query($sql);

/*
    for ($i = 0; $i<count($resultado);$i++){
        for ($x = 0; $row = $resultados->fetch_assoc();$x++){

        }
    }
*/
    for($i = 0; $row = $resultados->fetch_assoc();$i++){
        for($x = 0; $x < count($resultado);$x++){
            if($row["char_id"] == $resultado[$x]["id"]){
                $resultado[$x]["episodes"][] = $row["episode_id"];
            }
        }
    }


    return $resultado;

}