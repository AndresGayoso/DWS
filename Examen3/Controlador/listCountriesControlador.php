<?php

include_once "../Modelo/listCountriesModelo.php";

session_start();

if($_SESSION["LogIn"] != true){
    header("Location: ../Controlador/loginControlador.php");
}

$list = new listCountriesModelo();

if (isset($_GET["action"])){
    $pais = $_GET["countryCode"];
    if($list->getUserPower($_SESSION["userId"]) > $list->getCountryPower($pais)){
        $list->UpdateCountryOwner($_SESSION["userId"],$pais);
    }else{
        echo("
        <script>
            window.alert('Tienes menos poder (has perdido) ');
        </script>
        ");
    }


}

$countries = $list->getCountries($_SESSION["userId"]);
$mycountries = $list->getUserCountries($_SESSION["userId"]);

include_once "../Vistas/listCountriesVista.php";