<?php

include_once "../Modelo/listaPersonages.php";

$lista = new listaPersonages();

$personages = $lista->getPersonages();
$episodios = $lista->getAllEpisodes();

if (isset($_GET["personage"])&&isset($_GET["localizacion"])){
    $lista->changeLocation($_GET["personage"],$_GET["localizacion"]);
}

$return = array(
    "personages" => $personages,
    "episodios" => $episodios
);

echo json_encode($return);
