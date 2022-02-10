<?php

include_once "../Modelo/LogInModelo.php";

if(isset($_POST["txtUser"]) && isset($_POST["password"])){
    $login = new LogIn();
    $usuario = $login->CheckUser($_POST["txtUser"],$_POST["password"]);
    if ($usuario){
        session_start();
        $_SESSION["LogIn"] = true;
        $_SESSION["userId"] = $usuario->getId();
        $_SESSION["user"] = $usuario->getUsuario();
        header("Location: ../Controlador/listaControlador.php");
    }else{
        echo ("
        <script>
            window.alert('El usuario/email o contraseña son incorrectas');
        </script>
        ");
    }
}


include_once "../Vista/LogInVista.php";