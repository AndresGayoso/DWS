<?php

if(isset($_POST["email"])&&isset($_POST["password"])){
    $file = file_get_contents("http://localhost/Examen4/Back-end/Controlador/loginControlador.php?email=".$_POST["email"]."&password=".$_POST["password"]);
    $login_json = json_decode($file);
    if($login_json->result){
        session_start();
        $_SESSION["login"] = true;
        header("Location: ../Controlador/listaPersonagesControlador.php");
    }else{
        echo ('
            <script>
            window.alert("'.$login_json->error.'")
            </script>
        ');
    }
}

include_once "../Vista/loginVista.php";