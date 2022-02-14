<?php

if (isset($_POST["usuario"]) && isset($_POST["email"]) && isset($_POST["contra1"]) && isset($_POST["contra2"])) {
    if (strlen($_POST["usuario"]) < 25) {
        if (strlen($_POST["email"]) < 50) {
            if($_POST["contra1"] == $_POST["contra2"]){
                $file = file_get_contents("http://localhost/Actividades/API's/MVC%20Hoteles%20back-end/Controlador/SignUpControlador.php?user=".$_POST["usuario"]."&email=".$_POST["email"]."&passwd=".$_POST["contra1"]);
                $signup_json = json_decode($file);
                if ($signup_json->result){
                    echo "funciona";
                }else{
                    echo ('
                <script>
                    window.alert("'.$signup_json->error.'");
                </script>
                ');
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