<?php

include_once "../Modelo/singleHotelModelo.php";


$Hotel = new singleHotel();

$singleHotel = $Hotel->getHotel($_GET["HotelId"]);
$singleHotel->setHabitaciones($Hotel->getHabitaciones($_GET["HotelId"]));

include_once "../Vista/singleHotelVista.php";

