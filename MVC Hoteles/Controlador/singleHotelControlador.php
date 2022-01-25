<?php

include_once "../Modelo/singleHotelModelo.php";


$Hotel = new singleHotel();

/*$HotelId = $_GET["HotelId"];*/

$singleHotel = $Hotel->getHotel(1);

include_once "../Vista/singleHotelVista.php";

