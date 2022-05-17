<?php

if(isset($_GET["HotelId"])){
    $HotelSeleccionado = $_GET["HotelId"];
    $file = file_get_contents("http://localhost/API's/MVC%20Hoteles%20back-end/Controlador/listaControlador.php?HotelId=".$HotelSeleccionado);
    // Casa http://localhost/API's/MVC%20Hoteles%20back-end/Controlador/listaControlador.php
    // Clase http://localhost/Actividades/API's/MVC%20Hoteles%20back-end/Controlador/listaControlador.php
}else{
    $file = file_get_contents("http://localhost/API's/MVC%20Hoteles%20back-end/Controlador/listaControlador.php");
}

$json = json_decode($file);

$hoteles = $json->Hoteles;

$HotelId = "";
$HotelSeleccionado = "";
$Latitud = "40.1913498";
$Longitud = "-3.7937488";
$zoom = "6";

if (isset($_GET["HotelId"])) {
    $HotelId = $_GET["HotelId"];
    $HotelSeleccionado = $json->HotelSeleccionado;
    $Latitud = $json->Latitud;
    $Longitud = $json->Longitud;
    $zoom = $json->zoom;
}

session_start();

include_once ("../Vista/listaHoteles.php");
