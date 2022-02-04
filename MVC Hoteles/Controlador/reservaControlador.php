<?php

include_once "../Modelo/reservaModelo.php";

$reserva = new reservaModelo();

session_start();

$HotelId = $_GET["HotelId"];
$HabitacionId = $_GET["HabitacionId"];
$email = $_POST["email"];
$entrada = $_POST["entrada"];
$salida = $_POST["salida"];
$usuario = $_SESSION["userId"];

if(isset($email) && isset($entrada) && isset($salida)){
    if($reserva->ComprobarReserva($entrada, $salida, $HabitacionId) == false){
        $reserva->InsertarReserva($usuario,$HabitacionId,$entrada,$salida);
        echo ("
        <script>
            window.alert('Su resereva se realizo correctamente');
        </script>
        ");
    }else{
        echo ("
        <script>
            window.alert('Esta habitacion esta reservada entre estas fechas');
        </script>
        ");
    }
}

include_once "../Vista/reservaVista.php";
