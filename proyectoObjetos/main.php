<?php
include("Partido.php");

$contents1 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts");
$contents2 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results");
$contents3 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties");
$resultado = json_decode($contents2, true);
$partidos = json_decode($contents3, true);
$provincias = json_decode($contents1, true);

function createObjectPartidos($resultado){

    for($i = 0; $i < count($resultado);$i++){
        $resultado[$i] = new Partido($resultado[$i]['party'],$resultado[$i]['district'],$resultado[$i]['votes']);
    }

    return $resultado;

}

/*
 Ley Hondt
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
*/

$resultados = createObjectPartidos($resultado);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escaños</title>
</head>
<body>
<div>
    <form action="main.php" method="get">
        <select name="select">
            <option value="">Comunidad</option>
            <?php
                for($i = 0;$i < count($provincias);$i++){
                    echo '<option value="'.$provincias[$i]["id"].'"> '.$provincias[$i]["name"].'</option>';
                }
                ?>
        </select>
        <button type="submit">Mostrar</button>
    </form>
</div>
</body>
</html>
