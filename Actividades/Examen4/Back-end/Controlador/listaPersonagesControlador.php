<?php

include_once "../Modelo/listaPersonages.php";

$lista = new listaPersonages();

if (isset($_GET["personage"])&&isset($_GET["localizacion"])){
    $lista->changeLocation($_GET["personage"],$_GET["localizacion"]);
}

$personages = $lista->getPersonages();
$locations = $lista->getAllLocations();

$return = array(
    "personages" => $personages,
    "locations" => $locations
);

echo json_encode($return);
