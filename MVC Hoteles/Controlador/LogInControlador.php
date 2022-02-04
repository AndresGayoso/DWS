<?php
error_reporting(0);
include_once "../Modelo/LogInModelo.php";

$texto = $_POST["txtUser"];
$password = $_POST["password"];

if(isset($texto) && isset($password)){
    $login = new LogIn();
    $usuario = $login->CheckUser($texto,$password);
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