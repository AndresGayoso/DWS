<?php

include_once "../Modelo/singleHotelModelo.php";


$Hotel = new singleHotel();

$HotelId = $_GET["HotelId"];

$singleHotel = $Hotel->getHotel($HotelId);
$singleHotel->setHabitaciones($Hotel->getHabitaciones($HotelId));

include_once "../Vista/singleHotelVista.php";

