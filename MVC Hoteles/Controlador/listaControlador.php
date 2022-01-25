<?php

include_once ("../Modelo/listaModelo.php");

session_start();

$model = new listaModelo();
$hoteles = $model->getHoteles();

$HotelID = "";
$Latitude = "40.1913498";
$Longitude = "-3.7937488";
$zoom = 6;

if (isset($_GET["HotelId"])) {
    $HotelID = $_GET["HotelId"];
    $HotelSeleccionado = $model->getHotel($HotelID);
    $Latitude = $HotelSeleccionado->getLatitud();
    $Longitude = $HotelSeleccionado->getLongitud();
    $zoom = 15;
}

include_once ("../Vista/listaHoteles.php");
