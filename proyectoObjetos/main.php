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

function FilterProvincia($provincia){

    global $resultados;
    $selected = [];

    for($i = 0;$i < count($resultados);$i++){
        if($provincia == $resultados[$i]->getProvincia()){
            $selected[] = $resultados[$i];
        }
    }

    return $selected;

}

function FilterPartido(){

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



function Mapping(){

    global $filtroP;

    echo "<br><table border = 1>";
    echo "<tr><td>Provincia</td><td>Partido</td><td>Votos</td><td>Escaños</td></tr>";
    for ($i = 0;$i < count($filtroP);$i++){
        echo "<tr><td>";
        echo $filtroP[$i]->getProvincia();
        echo "</td>";
        echo "<td>";
        echo $filtroP[$i]->getNombre();
        echo "</td>";
        echo "<td>";
        echo $filtroP[$i]->getVotos();
        echo "</td>";
        echo "<td>";
        echo $filtroP[$i]->getEscanos();
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";


}

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
            <?php
            $select = $_GET["seleccion"];
            $selectP = $_GET["provincia"];
            echo ('<select name="seleccion">');
                echo ('<option value = "">Elige el filtro</option>');
                if($select == "comunidad"){
                    echo ('<option value="comunidad" selected>Filtrar por Comunidad</option>');
                }else{
                    ('<option value="comunidad">Filtrar por Comunidad</option>');
                }
                echo ('<option value="comunidad">Filtrar por Comunidad</option>');
                echo ('<option value="partidos">Filtrar por partidos</option>');
                echo ('<option value="generales">Resultados Generales</option>');
            echo ('</select>');
                if ($select == "comunidad"){
                    echo '<select name="provincia">';
                    for($i = 0;$i < count($provincias);$i++){
                        if ($selectP == $provincias[$i]["name"]){
                            echo '<option value="'.$provincias[$i]["name"].'" selected> '.$provincias[$i]["name"].'</option>';
                        }else{
                            echo '<option value="'.$provincias[$i]["name"].'"> '.$provincias[$i]["name"].'</option>';
                        }
                    }
                    echo '</select>';
                }
                if ($select == "partidos"){
                    echo '<select name="partidos">';
                    for($i = 0;$i < count($partidos);$i++){
                        echo '<option value="'.$partidos[$i]["name"].'"> '.$partidos[$i]["name"].'</option>';
                    }
                    echo '</select>';
                    $seleccionado = $select;
                }
                ?>
        <button type="submit">Filtrar</button>
    </form>
</div>
</body>
</html>
<?php

global $select;

if($select == "comunidad"){
    $selectP = $_GET["provincia"];
    if($selectP != ""){
        $filtroP = FilterProvincia($selectP);
        $escanos = LeyHondtProvincias($filtroP);
        Mapping();
    }
}
