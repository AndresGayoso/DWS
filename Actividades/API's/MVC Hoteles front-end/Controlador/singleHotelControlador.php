<?php

if(isset($_GET["HotelId"])){
    $HotelSeleccionado = $_GET["HotelId"];
    $file = file_get_contents("http://localhost/API's/MVC%20Hoteles%20back-end/Controlador/singleHotelControlador.php?HotelId=".$HotelSeleccionado);
    $hotel = json_decode($file)->Hotel;
    // Clase http://localhost/Actividades/API's/MVC%20Hoteles%20back-end/Controlador/singleHotelControlador.php
    // Casa http://localhost/API's/MVC%20Hoteles%20back-end/Controlador/singleHotelControlador.php
}else{
    die("NO ID SELECTED");
}

session_start();

include_once "../Vista/singleHotelVista.php";

