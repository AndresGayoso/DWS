<?php
include_once "../Modelo/loginModelo.php";

$return = array();
$result = false;
$error = "";

if (isset($_GET["email"]) && isset($_GET["password"]))
{
    $login = new loginModelo();
    $usuario = $login->CheckUser($_GET["email"], $_GET["password"]);
    if ($usuario->getId() > 0)
    {
        $return["usuario"] = $usuario;
        $result = true;
    }
    else{
        $error = "El email o la contraseña son incorrectos";
    }
}

$return["result"] = $result;
$return["error"] = $error;


echo json_encode($return);