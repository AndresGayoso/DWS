<?php

include_once "../Modelo/signupModelo.php";

$result = false;
$error = "";


if (isset($_GET["email"])&& isset($_GET["password"])){
    $signup = new signupModelo();
    if($signup->checkUser($_GET["email"]) == false){
        $hash = password_hash($_GET["password"],PASSWORD_DEFAULT);
        $signup->insertUser($_GET["email"],$hash);
        $result = true;
    }else{
        $error = "El usuario ya esta registrado";
    }
}else{
    $error = "Error en el inicio de sesion";
}

$return = array(
    "result" => $result,
    "error" => $error
);


echo json_encode($return);