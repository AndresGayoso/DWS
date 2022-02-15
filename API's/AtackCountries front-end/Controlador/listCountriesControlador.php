<?php

session_start();

if($_SESSION["LogIn"] != true){
    header("Location: ../Controlador/loginControlador.php");
}

$file = file_get_contents("http://localhost/Actividades/API's/AtackCountries%20back-end/Controlador/listCountriesControlador.php?user=".$_SESSION["userId"]);
$list_json = json_decode($file);

if (isset($_GET["action"]) && isset($_GET["countryCode"])){
    $file = file_get_contents("http://localhost/Actividades/API's/AtackCountries%20back-end/Controlador/listCountriesControlador.php?user=".$_SESSION["userId"]."&countryCode=".$_GET["countryCode"]);
    $list_json = json_decode($file);
}

if($list_json->result){
    $countries = $list_json->countries;
    $mycountries = $list_json->mycountries;
}else{
    echo('
        <script>
            window.alert("'.$list_json->error.'");
        </script>
        ');
}


include_once "../Vistas/listCountriesVista.php";