<?php
include ("PartidoPolitico.php");

$contents1 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts");
$contents2 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results");
$contents3 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties");
$resultado = json_decode($contents2, true);
$partidos = json_decode($contents3, true);
$provincias = json_decode($contents1, true);

 $partido = [0,0,0,0,0];
 $prueba = [15000,280000,60000,340000,160000];

function calcularEscaños(){

     global $partido;
     global $prueba;

     $mayor = 0;

    for ($i = 0; $i < 7;$i++){
        for ($x = 0; $x < count($prueba);$x++){
            if($prueba[$x] > $prueba[$mayor]){
                $mayor = $x;
            }
        }

        $partido[$mayor]++;

        $prueba[$mayor] = $prueba[$mayor] / 2;

    }

    return $partido;

}
echo ("<pre>");
var_dump($partidos);
echo ("</pre>");