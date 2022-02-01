<?php
include_once "../Modelo/loginModelo.php";

$mail = $_POST["mail"];
$password = $_POST["password"];


if (isset($mail) && isset($password))
{
    $login = new loginModelo();
    $usuario = $login->CheckUser($mail, $password);
    if ($usuario->getId() > 0)
    {
        session_start();
        $_SESSION["LogIn"] = true;
        $_SESSION["userId"] = $usuario->getId();
        $_SESSION["userMail"] = $usuario->getEmail();
        header("Location: ../Controlador/listCountriesControlador.php");
    }
    else{
        echo("
        <script>
            window.alert('El email o la contraseña son incorrectos');
        </script>
        ");
    }
}


include_once "../Vistas/loginVista.php";