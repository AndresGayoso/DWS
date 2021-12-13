<?php
include ("sort.php");
global $arrayOBJComplete;

$id = $_GET["id"];

for ($i = 0; $i < count($arrayOBJComplete); $i++){
    if ($arrayOBJComplete[$i]->getId() == $id){
        $pelicula = $arrayOBJComplete[$i];
        break;
    }
}
