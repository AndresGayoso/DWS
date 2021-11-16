<?php
$seed = 8189;
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

$c = json_decode(file_get_contents($api_url . "characters"), true);
$e = json_decode(file_get_contents($api_url . "episodes"), true);
$l = json_decode(file_get_contents($api_url . "locations"), true);

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

/*Insertar los datos en la tabla de caracteres(sin el array de episodios)
for($i = 0; $i < count($c);$i++){
    $id = $c[$i]["id"];
    $name = $c[$i]["name"];
    $status = $c[$i]["status"];
    $species = $c[$i]["species"];
    $type = $c[$i]["type"];
    $gender =  $c[$i]["gender"];
    $origin = $c[$i]["origin"];
    $location = $c[$i]["location"];
    $image = $c[$i]["image"];
    $created = $c[$i]["created"];

    $name = $conn->escape_string($name);

    $sql = "INSERT INTO Caracteres (id,name,status,species,type,gender,origin,location,image,created)
            VALUES ('".$id."','".$name."','".$status."','".$species."','".$type."','".$gender."','".$origin."','".$location."','".$image."','".$created."')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
*/

for($i = 0; $i < count($e);$i++){
    $id = $e[$i]["id"];
    $name = $e[$i]["name"];
    $air_date = $e[$i]["air_date"];
    $episode = $e[$i]["episode"];
    $created = $e[$i]["created"];

    $name = $conn->escape_string($name);

    $sql = "INSERT INTO Episodios (id,name,air_date,episode,created)
            VALUES ('".$id."','".$name."','".$air_date."','".$episode."','".$created."')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
/*
echo "<pre>";
var_dump($c);
echo "</pre>";*/

