<?php

session_start();

if(isset($_POST["email"]) && isset($_POST["entrada"]) && isset($_POST["salida"])){
    $file = file_get_contents("http://localhost/API's/MVC%20Hoteles%20back-end/Controlador/reservaControlador.php?user=".$_SESSION["userId"]."&email=".$_POST["email"]."&entrada=".$_POST["entrada"]."&salida=".$_POST["salida"]."&HabitacionId=".$_GET["HabitacionId"]);
    // Casa http://localhost/API's/MVC%20Hoteles%20back-end/Controlador/reservaControlador.php
    // Clase  http://localhost/Actividades/API's/MVC%20Hoteles%20back-end/Controlador/reservaControlador.php
    $reserva_json = json_decode($file);
    if ($reserva_json->result){
        echo ('
          <script>
             window.alert("'.$reserva_json->info.'");
          </script>
        ');
        header("Location: ../Controlador/listaControlador.php");
    }else{
        echo ('
          <script>
             window.alert("'.$reserva_json->error.'");
          </script>
        ');
    }
}

include_once "../Vista/reservaVista.php";
