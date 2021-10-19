<?php

$contents_cities = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=cities");
$cities = json_decode($contents_cities, true);
$contents_countries = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/world.php?data=countries");
$countries = json_decode($contents_countries, true);

function mapCities($ciudades,$paises)
{
    //TODO: Your code here
    for($i = 0; $i < count($ciudades);$i++){
        for ($x = 0; $x < count($paises);$x++){
            if ($ciudades[$i]["CountryCode"] == $paises[$x]["Code"]){
                $ciudades[$i]["CountryName"] = $paises[$x]["Name"];
            }
        }
    }

    return $ciudades;
}

function mapCountries($ciudades,$paises)
{
    //TODO: Your code here
    for($i = 0; $i < count($paises);$i++){
        for ($x = 0; $x < count($ciudades);$x++){
            if ($paises[$i]["Code"] == $ciudades[$x]["CountryCode"]){
                $paises[$i]["Cities"][]["CityName"] = $ciudades[$x]["Name"];
            }
        }
    }
    return $paises;
}

//Mostrar los Paises + el nombre de sus ciudades
echo ("<pre>");
var_dump(mapCountries($cities,$countries));
echo ("</pre>");

//Mostrar las Ciudades + Nombre del pais
echo ("<pre>");
var_dump(mapCities($cities,$countries));
echo ("</pre>");

