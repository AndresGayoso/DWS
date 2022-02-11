<?php

include_once ("../Modelo/listaModelo.php");

$model = new listaModelo();
$hoteles = $model->getHoteles();


$return = array(
    "Hoteles" => $model->getHoteles(),
    "HotelSeleccionado" => "",
    "Latitud" => "40.1913498",
    "Longitud" => "-3.7937488",
    "zoom" => "6"
);

if (isset($_GET["HotelId"])) {
    $HotelSeleccionado = $model->getHotel($_GET["HotelId"]);
    $return = array(
        "Hoteles" => $model->getHoteles(),
        "HotelId" => $_GET["HotelId"],
        "HotelSeleccionado" => $HotelSeleccionado,
        "Latitud" => $HotelSeleccionado->getLatitud(),
        "Longitud" => $HotelSeleccionado->getLongitud(),
        "zoom" => "15"
    );
}
echo "<pre>";
echo json_encode($return);
echo "<pre>";
