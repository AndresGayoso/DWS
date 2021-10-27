<?php
include ("PartidoPolitico.php");

$partidos = ["PP","PSOE","PACMA"];

$provincias = ["Madrid","Barcelona","Valencia","Alicante","Sevilla","Málaga","Murcia","Cádiz","Baleares","La Coruña","Las Palmas",
    "Vizcaya","Asturias","Granada","Pontevedra","Santa Cruz de  Tenerife","Zaragoza","Almería","Badajoz","Córdoba","Gerona","Guipúzcoa",
    "Tarragona","Toledo","Cantabria","Castellón","Ciudad Real","Huelva","Jaén","Navarra","Valladolid","Álava","Albacete","Burgos",
    "Cáceres","León","Lérida","Lugo","Orense","La Rioja","Salamanca","Ávila","Cuenca","Guadalajara","Huesca","Palencia","Segovia",
    "Teruel","Zamora","Soria","Ceuta","Melilla"];

$provinc =
    [0 => ["name" => "Madrid","escaños" => 37],
    1 => ["name" => "Barcelona","escaños" => 32],
    2 => ["name" => "Valencia","escaños" => 15],
    3 => ["name" => "Alicante","escaños" => 12],
    4 => ["name" => "Sevilla","escaños" => 12],
    5 => ["name" => "Malaga","escaños" => 11],
    6 => ["name" => "Murcia","escaños" => 10],
    7 => ["name" => "Cadiz","escaños" => 9],
    8 => ["name" => "Baleares","escaños" => 8],
    9 => ["name" => "La Coruña","escaños" => 8],
    10 => ["name" => "Las palmas","escaños" => 8],
    11 => ["name" => "Vizcaya","escaños" => 8],
    12 => ["name" => "Asturias","escaños" => 7],
    13 => ["name" => "Granada","escaños" => 7],
    14 => ["name" => "Pontevedra","escaños" => 7],
    15 => ["name" => "Santa Cruz de Tenerife","escaños" => 7],
    16 => ["name" => "Zaragoza","escaños" => 7],
    17 => ["name" => "Almeria","escaños" => 6],
    18 => ["name" => "Badajoz","escaños" => 6],
    19 => ["name" => "Cordoba","escaños" => 6],
    20 => ["name" => "Gerona","escaños" => 6],
    21 => ["name" => "Guipuzcoa","escaños" => 6],
    22 => ["name" => "Tarragona","escaños" => 6],
    23 => ["name" => "Toledo","escaños" => 6],
    24 => ["name" => "Cantabria","escaños" => 5],
    25 => ["name" => "Castellon","escaños" => 5],
    26 => ["name" => "Ciudad Real","escaños" => 5],
    27 => ["name" => "Huelva","escaños" => 5],
    28 => ["name" => "Jaen","escaños" => 5],
    29 => ["name" => "Navarra","escaños" => 5],
    30 => ["name" => "Valladolid","escaños" => 5],
    31 => ["name" => "Alava","escaños" => 4],
    32 => ["name" => "Albacete","escaños" => 4],
    33 => ["name" => "Burgos","escaños" => 4],
    34 => ["name" => "Caceres","escaños" => 4],
    35 => ["name" => "Leon","escaños" => 4],
    36 => ["name" => "Lerida","escaños" => 4],
    37 => ["name" => "Lugo","escaños" => 4],
    38 => ["name" => "Orense","escaños" => 4],
    39 => ["name" => "La Rioja","escaños" => 4],
    40 => ["name" => "Salamanca","escaños" => 4],
    41 => ["name" => "Avila","escaños" => 3],
    42 => ["name" => "Cuenca","escaños" => 3],
    43 => ["name" => "Guadalajara","escaños" => 3],
    44 => ["name" => "Huesca","escaños" => 3],
    45 => ["name" => "Palencia","escaños" => 3],
    46 => ["name" => "Segovia","escaños" => 3],
    47 => ["name" => "Teruel","escaños" => 3],
    48 => ["name" => "Zamora","escaños" => 3],
    49 => ["name" => "Soria","escaños" => 2],
    50 => ["name" => "Ceuta","escaños" => 1],
    51 => ["name" => "Melilla","escaños" => 1]];




function createPartidos(){
    global $partidos;
    global $provincias;


    for ($i = 0; $i < count($partidos);$i++){
        for ($x = 0; $x < count($provincias);$x++){

        }
    }

}
echo ("<pre>");
var_dump($provinc);
echo ("</pre>");