<?php
error_reporting(0);
include_once "../Modelo/SignUpModelo.php";

$sigin = new SignUp();

if (isset($_POST["usuario"]) && isset($_POST["email"]) && isset($_POST["contra1"]) && isset($_POST["contra2"])) {
    if (strlen($_POST["usuario"]) < 25) {
        if (strlen($_POST["email"]) < 50) {
            if($_POST["contra1"] == $_POST["contra2"]){
                $passwdHash = password_hash($_POST["contra1"],PASSWORD_DEFAULT);
                if($sigin->insertUser($_POST["usuario"],$_POST["email"],$passwdHash)){
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