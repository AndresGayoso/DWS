<?php

if(isset($_POST["txtUser"]) && isset($_POST["password"])){
    $file = file_get_contents("http://localhost/API's/MVC%20Hoteles%20back-end/Controlador/LogInControlador.php?user=".$_POST["txtUser"]."&password=".$_POST["password"]);
    // Casa http://localhost/API's/MVC%20Hoteles%20back-end/Controlador/LogInControlador.php
    // Clase http://localhost/Actividades/API's/MVC%20Hoteles%20back-end/Controlador/LogInControlador.php
    $login_json = json_decode($file);
    if($login_json->result){
        session_start();
        $_SESSION["LogIn"] = true;
        $_SESSION["userId"] = $login_json->usuario->id;
        $_SESSION["user"] = $login_json->usuario->usuario;
        header("Location: ../Controlador/listaControlador.php");
    }else{
        echo ('
          <script>
             window.alert("'.$login_json->error.'");
          </script>
        ');
    }
}


include_once "../Vista/LogInVista.php";