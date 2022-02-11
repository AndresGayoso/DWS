<?php
error_reporting(0);
include_once "../Modelo/SignUpModelo.php";

$sigin = new SignUp();

if (isset($_GET["usuario"]) && isset($_GET["email"]) && isset($_GET["contra1"]) && isset($_GET["contra2"])) {
    if (strlen($_GET["usuario"]) < 25) {
        if (strlen($_GET["email"]) < 50) {
            if($_GET["contra1"] == $_GET["contra2"]){
                $passwdHash = password_hash($_GET["contra1"],PASSWORD_DEFAULT);
                if($sigin->insertUser($_GET["usuario"],$_GET["email"],$passwdHash)){
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