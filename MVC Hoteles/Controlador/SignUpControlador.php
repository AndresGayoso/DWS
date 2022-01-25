<?php
error_reporting(0);
include_once "../Modelo/SignUpModelo.php";

$sigin = new SignUp();

$user = $_POST["usuario"];
$email = $_POST["email"];
$passwd1 = $_POST["contra1"];
$passwd2 = $_POST["contra2"];


if (isset($user) && isset($email) && isset($passwd1) && isset($passwd2)) {
    if (strlen($user) < 25) {
        if (strlen($email) < 50) {
            if($passwd1 == $passwd2){
                $passwdHash = password_hash($passwd1,PASSWORD_DEFAULT);
                if($sigin->insertUser($user,$email,$passwdHash)){
                    header("Location: ../Controlador/LogInControlador.php");
                }else{
                    echo ("
                    <script>
                        window.alert('El usuario ya esta registrado');
                    </script>
                    ");
                }
            }else{
                echo ("
                <script>
                    window.alert('Las contraseñas no coinciden');
                </script>
                ");
            }
        } else {
            echo("
            <script>
                window.alert('El email no debe pasar de 50 caracteres');
            </script>
            ");
        }
    } else {
        echo("
        <script>
            window.alert('El nombre de usuario no debe pasar de 25 caracteres');
        </script>
        ");
    }

}

include_once "../Vista/SignUpVista.php";