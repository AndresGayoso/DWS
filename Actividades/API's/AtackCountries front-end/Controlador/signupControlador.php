<?php


if(isset($_POST["email"])&&isset($_POST["password"])&&isset($_POST["password2"])){
    if($_POST["password"] == $_POST["password2"]){
        $file = file_get_contents("http://localhost/Actividades/API's/AtackCountries%20back-end/Controlador/signupControlador.php?email=".$_POST["email"]."&password=".$_POST["password"]);
        $signup_json = json_decode($file);
        if($signup_json->result){
            header('Location: ../Controlador/loginControlador.php');
        }else{
            echo('
        <script>
            window.alert("'.$signup_json->error.'")
        </script>
        ');
        }
    }else{
        echo("
        <script>
            window.alert('Las contraseñas no coinciden')
        </script>
        ");
    }
}

include_once "../Vistas/sigupVista.php";