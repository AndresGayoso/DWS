<?php

include_once "../Modelo/signupModelo.php";

$signup = new signupModelo();

$email = $_POST["mail"];
$passwd1 = $_POST["password"];
$passwd2 = $_POST["password2"];

if(isset($email)&&isset($passwd1)&&isset($passwd2)){
    if($signup->checkUser($email) == false){
        if($passwd1 == $passwd2){
            $hash = password_hash($passwd1,PASSWORD_DEFAULT);
            $signup->insertUser($email,$hash);
            $userId = $signup->getUser($email);
            $signup->RandomCountry($userId);
            header('Location: ../Controlador/loginControlador.php');
        }else{
            echo("
        <script>
            window.alert('Las contraseñas no coinciden')
        </script>
        ");
        }
    }else{
        echo("
        <script>
            window.alert('El usuario ya esta registrado')
        </script>
        ");
    }
}

include_once "../Vistas/sigupVista.php";