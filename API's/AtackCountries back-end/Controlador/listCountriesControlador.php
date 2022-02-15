<?php

include_once "../Modelo/listCountriesModelo.php";

$return = array();
$result = false;
$error = "";

$list = new listCountriesModelo();

if (isset($_GET["countryCode"])){
    if($list->getUserPower($_GET["user"]) > $list->getCountryPower($_GET["countryCode"])){
        $list->UpdateCountryOwner($_GET["user"],$_GET["countryCode"]);
        $return = array(
            "result" => true,
            "info" => "Tenias mas poder (has ganado)"
        );
    }else{
        $return = array(
            "result" => $result,
            "error" => "Tienes menos poder(Has perdido)"
        );
    }
}

if(isset($_GET["user"])){
    $countries = $list->getCountries($_GET["user"]);
    $mycountries = $list->getUserCountries($_GET["user"]);
    $return = array(
        "countries" => $countries,
        "mycountries" => $mycountries,
        "result" => true
    );
}else{
    $return = array(
        "result" => $result,
        "error" => "Error con el usuario"
    );
}

echo json_encode($return);