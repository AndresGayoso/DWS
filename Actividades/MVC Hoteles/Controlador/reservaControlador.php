<?php

include_once "../Modelo/reservaModelo.php";

$reserva = new reservaModelo();

session_start();

if(isset($_POST["email"]) && isset($_POST["entrada"]) && isset($_POST["salida"])){
    if($reserva->ComprobarReserva($_POST["entrada"], $_POST["salida"], $_GET["HabitacionId"]) == false){
        $reserva->InsertarReserva($_SESSION["userId"],$_GET["HabitacionId"],$_POST["entrada"],$_POST["salida"]);
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
