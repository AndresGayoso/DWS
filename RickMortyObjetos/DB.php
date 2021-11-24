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

    $sql = "SELECT * FROM Caracteres";
    $resultados = $conn->query($sql);

    $resultado = $resultados->fetch_all(MYSQLI_ASSOC);

    $sql = "SELECT * FROM CharEpis";
    $resultados = $conn->query($sql);

    for($i = 0; $row = $resultados->fetch_assoc();$i++){
        for($x = 0; $x < count($resultado);$x++){
            if($row["char_id"] == $resultado[$x]["id"]){
                $resultado[$x]["episodes"][] = $row["episodes_id"];
            }
        }
    }

    return $resultado;
}

function DatosEpisodios(){
    global $conn;

    $sql = "SELECT * FROM Episodios";
    $resultados = $conn->query($sql);

    $resultado = $resultados->fetch_all(MYSQLI_ASSOC);

    return $resultado;
}

function DatosLocation(){
    global $conn;

    $sql = "SELECT * FROM Locations";
    $resultados = $conn->query($sql);

    $resultado = $resultados->fetch_all(MYSQLI_ASSOC);

    return $resultado;
}