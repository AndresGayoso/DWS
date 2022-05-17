<?php
$contents1 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts");
$contents2 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results");
$contents3 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties");
$resultado = json_decode($contents2, true);
$partidos = json_decode($contents3, true);
$provincias = json_decode($contents1, true);


$servername = "sql480.main-hosting.eu";
$username = "u850300514_agayoso";
$password = "x45188189C";
$dbname = "u850300514_agayoso";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
/*
$sql = "SELECT * FROM Provincias";
$result = $conn->query($sql);
*/

/*
if ($result->num_rows > 0) {
    // output data of each row
    for($i = 0;$row = $result->fetch_assoc();$i++) {
        $hola[$i]["id"] = $row["id"];
    }
} else {
    echo "0 results";
}
*/
/* Introducir los datos de partidos en la base de datos
for ($i = 0; $i < count($partidos);$i++){
    $id = $partidos[$i]["id"];
    $nombre = $partidos[$i]["name"];
    $acronym = $partidos[$i]["acronym"];
    $logo = $partidos[$i]["logo"];
    $color = $partidos[$i]["colour"];
    $nombre = $conn->escape_string($nombre);
    $sql = "INSERT INTO Partidos (id,nombre,acronym,logo,color)
            VALUES ('".$id."','".$nombre."','".$acronym."','".$logo."','".$color."')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
*/
/* Introducir los datos de resultados en la base de datos
for ($i = 0; $i < count($resultado);$i++){
    $distrito = $resultado[$i]["district"];
    $partido = $resultado[$i]["party"];
    $votos = $resultado[$i]["votes"];
    $partido = $conn->escape_string($partido);
    $sql = "INSERT INTO Resultados (distrito,partido,votos)
            VALUES ('".$distrito."','".$partido."','".$votos."')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
*/
/* Introducir los datos de provicias en la base de datos
for ($i = 0; $i < count($provincias);$i++){
    $id = $provincias[$i]["id"];
    $nombre = $provincias[$i]["name"];
    $delegates = $provincias[$i]["delegates"];
    $sql = "INSERT INTO Provincias (id, nombre, delegates)
            VALUES ('".$id."','".$nombre."','".$delegates."')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
*/
/*
$sql = "DELETE FROM Partidos";
$conn->query($sql);
$conn->close();
/*
echo "<pre>";
var_dump($partidos);
echo "</pre>";
*/
?>