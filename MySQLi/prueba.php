<?php
$contents1 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts");
$contents2 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results");
$contents3 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties");
$resultado = json_decode($contents2, true);
$partidos = json_decode($contents3, true);
$provincias = json_decode($contents1, true);


$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "Circumscripcion";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

for ($i = 0; $i < count($provincias);$i++){
    $id = $provincias[$i]["id"];
    $nombre =$provincias[$i]["name"];
    $delegates = $provincias[$i]["delegates"];

    $sql = "INSERT INTO Provincias (id, nombre, delegates)
            VALUES ('".$provincias[$i]["id"]."','".$nombre."','".$delegates."')";
}


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
/*
echo "<pre>";
var_dump($provincias);
echo "</pre>";
*/
?>