<?php
error_reporting(0);
include("Partido.php");
include("Generales.php");

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
function createObjectGenerales($general){

    global $resultado;

    for($i = 0; $i < count($general);$i++){
        $general[$i] = new Generales($general[$i]['name'],0);
    }

    for($i = 0; $i < count($general);$i++){
        for ($x = 0; $x < count($resultado);$x++){
            if ($general[$i]->getNombre() == $resultado[$x]["party"]){
                $general[$i]->setVotos($general[$i]->getVotos()+$resultado[$x]["votes"]);
            }
        }
    }

    return $general;

}

function FilterProvincia($provincia){

    global $objeto;
    $selected = [];

    for($i = 0;$i < count($objeto);$i++){
        if($provincia == $objeto[$i]->getProvincia()){
            $selected[] = $objeto[$i];
        }
    }

    return $selected;

}

function FilterPartido($partido){
    global $objeto;
    $selected = [];

    for($i = 0;$i < count($objeto);$i++){
        if($partido == $objeto[$i]->getNombre()){
            $selected[] = $objeto[$i];
        }
    }

    return $selected;

}

function LeyHondtProvincias($partidos){

    global $provincias;

    $escanos = [];
    $votos = [];

    for($i = 0;$i < count($partidos);$i++){
        $escanos[] = 0;
        $votos[] = $partidos[$i]->getVotos();
    }

    $mayor = 0;
    $total = 0;

    for ($i = 0;$i < count($partidos);$i++){
        for($x = 0;$x < count($provincias);$x++){
            if ($partidos[$i]->getProvincia() == $provincias[$i]["name"]){
                $total = $provincias[$i]["delegates"];
                break 2;
            }
        }
    }

    for ($i = 0; $i <= $total;$i++) {
        for ($x = 0; $x < count($votos); $x++) {
            if ($votos[$x] > $votos[$mayor]) {
                $mayor = $x;
            }
        }

    $escanos[$mayor]++;

    $votos[$mayor] = $votos[$mayor] / 2;
    }

    for($i = 0; $i < count($partidos);$i++){
        $partidos[$i]->setEscanos($escanos[$i]);
    }

    return $partidos;

}

function LeyHondtGenerales($objeto)
{
    global $provincias;

    $escanos = [];
    $votos = [];

    for($i = 0;$i < count($objeto);$i++){
        $escanos[] = 0;
        $votos[] = $objeto[$i]->getVotos();
    }



    return $objeto;

}



function Mapping($filtro){

    echo "<br><table border = 1>";
    echo "<tr><td>Provincia</td><td>Partido</td><td>Votos</td><td>Escaños</td></tr>";
    for ($i = 0;$i < count($filtro);$i++){
        echo "<tr><td>";
        echo $filtro[$i]->getProvincia();
        echo "</td>";
        echo "<td>";
        echo $filtro[$i]->getNombre();
        echo "</td>";
        echo "<td>";
        echo $filtro[$i]->getVotos();
        echo "</td>";
        echo "<td>";
        echo $filtro[$i]->getEscanos();
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

}
function MappingGenerales($filtro){

    echo "<br><table border = 1>";
    echo "<tr><td>Partido</td><td>Votos</td><td>Escaños</td></tr>";
    for ($i = 0;$i < count($filtro);$i++){
        echo "<tr><td>";
        echo $filtro[$i]->getNombre();
        echo "</td>";
        echo "<td>";
        echo $filtro[$i]->getVotos();
        echo "</td>";
        echo "<td>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

}

$objeto = createObjectPartidos($resultado);
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
            <?php
            $select = $_GET["seleccion"];
            $selectC = $_GET["provincia"];
            $selectP = $_GET["partido"];
            echo ('<select name="seleccion">');
                echo ('<option value = "">Elige el filtro</option>');
                if($select == "comunidad"){
                    echo ('<option value="comunidad" selected>Filtrar por Comunidad</option>');
                }else{
                    echo ('<option value="comunidad">Filtrar por Comunidad</option>');
                }
                if($select == "partidos"){
                    echo ('<option value="partidos" selected>Filtrar por partidos</option>');
                }else{
                    echo ('<option value="partidos">Filtrar por partidos</option>');
                }
                if($select == "generales"){
                    echo ('<option value="generales" selected>Resultados Generales</option>');
                }else{
                    echo ('<option value="generales">Resultados Generales</option>');
                }
            echo ('</select>');
                if ($select == "comunidad"){
                    echo '<select name="provincia">';
                    for($i = 0;$i < count($provincias);$i++){
                        if ($selectC == $provincias[$i]["name"]){
                            echo '<option value="'.$provincias[$i]["name"].'" selected> '.$provincias[$i]["name"].'</option>';
                        }else{
                            echo '<option value="'.$provincias[$i]["name"].'"> '.$provincias[$i]["name"].'</option>';
                        }
                    }
                    echo '</select>';
                }
                if ($select == "partidos"){
                    echo '<select name="partido">';
                    for($i = 0;$i < count($partidos);$i++){
                        if($selectP == $partidos[$i]["name"]) {
                            echo '<option value="'.$partidos[$i]["name"].'" selected>'.$partidos[$i]["name"].'</option>';
                        }else{
                            echo '<option value="'.$partidos[$i]["name"].'"> '.$partidos[$i]["name"].'</option>';
                        }
                    }
                    echo '</select>';
                }
                ?>
        <button type="submit">Filtrar</button>
    </form>
</div>
</body>
</html>
<?php

global $select;
global $selectC;
global $selectP;

if($select == "comunidad"){
    $objeto = createObjectPartidos($resultado);
    $selectC = $_GET["provincia"];
    if($selectC != ""){
        $filtroC = FilterProvincia($selectC);
        $escanos = LeyHondtProvincias($filtroC);
        Mapping($filtroC);
    }
}
if ($select == "partidos"){
    $selectP = $_GET["partido"];
    if($selectP != ""){
       $filtroP = FilterPartido($selectP);
       Mapping($filtroP);
    }
}
if ($select == "generales"){
    $objeto = createObjectGenerales($partidos);
    if($select != ""){
        LeyHondtGenerales($objeto);
    }
}
