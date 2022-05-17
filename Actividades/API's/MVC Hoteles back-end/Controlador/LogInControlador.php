<?php

include_once "../Modelo/LogInModelo.php";

$return = array();
$result = false;
$error = "";

if(isset($_GET["user"]) && isset($_GET["password"])){
    $login = new LogIn();
    $usuario = $login->CheckUser($_GET["user"],$_GET["password"]);
    if ($usuario->getId() > 0){
        $result = true;
        $return["usuario"] = $usuario;
    }else{
        $error = "El usuario o la contraseña son incorrectas";
    }
}else{
    $error = "El login ha fallado";
}

$return["result"] = $result;
$return["error"] = $error;

echo json_encode($return);
