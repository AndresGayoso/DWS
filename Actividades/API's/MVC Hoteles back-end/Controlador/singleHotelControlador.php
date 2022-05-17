<?php

include_once "../Modelo/singleHotelModelo.php";


$Hotel = new singleHotel();

$return = array();

if (isset($_GET["HotelId"])){
    $singleHotel = $Hotel->getHotel($_GET["HotelId"]);
    $singleHotel->setHabitaciones($Hotel->getHabitaciones($_GET["HotelId"]));
    $return["Hotel"] = $singleHotel;
}else{
    $return["error"] = "NO ID SELECTED";
}

echo json_encode($return);

