<?php

include_once "../Modelo/reservaModelo.php";

$return = array();
$result = false;
$error = "";
$info = "";

if(isset($_GET["user"]) && isset($_GET["email"]) && isset($_GET["entrada"]) && isset($_GET["salida"]) && isset($_GET["HabitacionId"])){
    $reserva = new reservaModelo();
    if($reserva->ComprobarReserva($_GET["entrada"], $_GET["salida"], $_GET["HabitacionId"]) == false){
        if($reserva->InsertarReserva($_GET["user"],$_GET["HabitacionId"],$_GET["entrada"],$_GET["salida"])){
            $result = true;
            $info = "La reserva se ha hecho correctamente";
        }else{
            $error = "Hubo un error en la reserva";
        }
    }else{
        $error = "La habitacion ya esta reservada esas fechas";
    }
}else{
    $error = "Hubo un fallo en los datos";
}
$return["info"] = $info;
$return["result"] = $result;
$return["error"] = $error;

echo json_encode($return);
