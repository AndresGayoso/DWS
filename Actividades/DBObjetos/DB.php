<?php
$servername = "sql480.main-hosting.eu";
$username = "u850300514_agayoso";
$password = "x45188189C";
$dbname = "u850300514_agayoso";

$conn = new mysqli($servername, $username, $password, $dbname);

function DatosResultados(){

    global $conn;

    $resultado = [];

    $sql = "SELECT * FROM Resultados";
    $resultados = $conn->query($sql);

    for($i = 0; $row = $resultados->fetch_assoc();$i++){
        $resultado[$i]["district"] = $row["distrito"];
        $resultado[$i]["party"] = $row["partido"];
        $resultado[$i]["votes"] = $row["votos"];
    }

    return $resultado;

}
function DatosPartidos(){

    global $conn;

    $resultado = [];

    $sql = "SELECT * FROM Partidos";
    $resultados = $conn->query($sql);

    for($i = 0; $row = $resultados->fetch_assoc();$i++){
        $resultado[$i]["id"] = $row["id"];
        $resultado[$i]["name"] = $row["nombre"];
        $resultado[$i]["acronym"] = $row["acronym"];
        $resultado[$i]["logo"] = $row["logo"];
        $resultado[$i]["colour"] = $row["color"];
    }

    return $resultado;

}
function DatosProvincias(){

    global $conn;

    $resultado = [];

    $sql = "SELECT * FROM Provincias";
    $resultados = $conn->query($sql);

    for($i = 0; $row = $resultados->fetch_assoc();$i++){
        $resultado[$i]["id"] = $row["id"];
        $resultado[$i]["name"] = $row["nombre"];
        $resultado[$i]["delegates"] = $row["delegates"];
    }

    return $resultado;

}