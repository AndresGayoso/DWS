<?php
include ("PartidoPolitico.php");

//$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts");
//$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results");
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties");
$provincias = json_decode($contents, true);

 $partidos = [0,0,0,0,0];
 $prueba = [15000,280000,60000,340000,160000];

function createPartidos(){

     global $partidos;
     global $prueba;

     $mayor = 0;

    for ($i = 0; $i < 7;$i++){
        for ($x = 0; $x < count($prueba);$x++){
            if($prueba[$x] > $prueba[$mayor]){
                $mayor = $x;
            }
        }

        $partidos[$mayor]++;

        $prueba[$mayor] = $prueba[$mayor] / 2;

    }

    return $partidos;

}
echo ("<pre>");
var_dump(createPartidos());
echo ("</pre>");