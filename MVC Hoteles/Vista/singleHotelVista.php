<?php

echo $singleHotel->getNombre();
echo "<br>";
echo $singleHotel->getUbicacion();
echo "<br>";
echo $singleHotel->getCalle();
echo "<br>";
echo $singleHotel->getEstrellas();
echo "<br>";
echo $singleHotel->getLatitud();
echo "<br>";
echo $singleHotel->getLongitud();
echo "<br>";
echo $singleHotel->getCalificacion();
echo "<br>";
echo $singleHotel->getHoraEntrada();
echo "<br>";
echo $singleHotel->getHoraSalida();
echo "<br>";
echo $singleHotel->getTelefono();
echo "<br>";
echo $singleHotel->getDescricpcion();
echo "<br>";
for ($i = 0; $i < $singleHotel->getImagenes();$i++){
    echo $singleHotel->getImagenes()[$i]->getUrl();
    echo "<br>";
}