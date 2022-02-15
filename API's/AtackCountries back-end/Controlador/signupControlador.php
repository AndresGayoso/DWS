<?php

include_once "../Modelo/signupModelo.php";

$return = array();
$result = false;
$error = "";

if(isset($_GET["email"])&&isset($_GET["password"])){
    $signup = new signupModelo();
    if($signup->checkUser($_GET["email"]) == false){
            $hash = password_hash($_GET["password"],PASSWORD_DEFAULT);
            $signup->insertUser($_GET["email"],$hash);
            $userId = $signup->getUser($_GET["email"]);
            $signup->RandomCountry($userId);
            $result = true;
        }else{
            $error = "El usuario ya existe";
        }
}

$return["result"] = $result;
$return["error"] = $error;

echo json_encode($return);