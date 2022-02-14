<?php

include_once "../Modelo/SignUpModelo.php";

$return = array();
$result = false;
$error = "";

if (isset($_GET["user"]) && isset($_GET["email"]) && isset($_GET["passwd"])){
    $signup = new SignUp();
    $passwdHash = password_hash($_GET["passwd"],PASSWORD_DEFAULT);
    if ($signup->insertUser($_GET["user"],$_GET["email"],$passwdHash)){
        $result = true;
    }else{
        $error = "El usuario esta registrado";
    }
}else{
    $error = "El registro ha fallado";
}

$return["result"] = $result;
$return["error"] = $error;

echo json_encode($return);