<?php
error_reporting(0);
include("Provincia.php");
include("Generales.php");
include ("Partido.php");

$contents1 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts");
$contents2 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results");
$contents3 = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties");
$resultado = json_decode($contents2, true);
$partidos = json_decode($contents3, true);
$provincias = json_decode($contents1, true);

$objeto = createObjectProvincias($resultado);
$general = createObjectGenerales($partidos);
$party = createObjectPartidos($resultado);

//Funcion para crear el objeto de provincia
function createObjectProvincias($resultado){

    //Bucle para crear el array objetos
    for ($i = 0; $i < count($resultado); $i++) {
        //Convertimos el array con los valores en un array de objetos(Provincia,Partido,Votos,Escaños).
        $resultado[$i] = new Provincia($resultado[$i]['district'],$resultado[$i]['party'], $resultado[$i]['votes'], 0);
    }

    return $resultado;

}

//Funcion para crear el objeto de partido
function createObjectPartidos($resultado){

    //Bucle para crear el array objetos
    for ($i = 0; $i < count($resultado); $i++) {
        //Convertimos el array con los valores en un array de objetos(Partido,Provincia,Votos,Escaños).
        $resultado[$i] = new Partido($resultado[$i]['party'],$resultado[$i]['district'], $resultado[$i]['votes'], 0);
    }

    return $resultado;

}

function createObjectGenerales($general)
{

    global $resultado;

    for ($i = 0; $i < count($general); $i++) {
        $general[$i] = new Generales($general[$i]['name'], 0, 0);
    }

    for ($i = 0; $i < count($general); $i++) {
        for ($x = 0; $x < count($resultado); $x++) {
            if ($general[$i]->getNombre() == $resultado[$x]["party"]) {
                $general[$i]->setVotos($general[$i]->getVotos() + $resultado[$x]["votes"]);
            }
        }
    }

    return $general;

}

function FilterProvincia($provincia)
{

    global $objeto;
    $selected = [];

    for ($i = 0; $i < count($objeto); $i++) {
        if ($provincia == $objeto[$i]->getNombre()) {
            $selected[] = $objeto[$i];
        }
    }

    return $selected;

}
function FilterPartido($provincia)
{

    global $party;
    $selected = [];

    for ($i = 0; $i < count($party); $i++) {
        if ($provincia == $party[$i]->getProvincia()) {
            $selected[] = $party[$i];
        }
    }

    return $selected;

}

function LeyHondtProvincias($partidos)
{

    global $provincias;
    global $booleano;

    $escanos = [];
    $votos = [];
    $totalVotos = 0;
    $valido = [];
    $novalido=[];

    for ($i = 0; $i < count($partidos); $i++) {
        $totalVotos += $partidos[$i]->getVotos();
    }
    for ($i = 0; $i < count($partidos); $i++) {
        if (($totalVotos * 3 / 100) < $partidos[$i]->getVotos()) {
            $valido[] = $partidos[$i];
        }else{
            $novalido[] = $partidos[$i];
        }

    }

    for ($i = 0; $i < count($valido); $i++) {
        $escanos[$i]["escanos"] = 0;
        $escanos[$i]["dividir"] = 1;
        $votos[] = $valido[$i]->getVotos();
    }

    $mayor = 0;
    $total = 0;

    for ($i = 0; $i < count($valido); $i++) {
        for ($x = 0; $x < count($provincias); $x++) {
            if($booleano == false){
                if ($valido[$i]->getNombre() == $provincias[$x]["name"]) {
                    $total = $provincias[$x]["delegates"];
                    break 2;
                }
            }
            if($booleano == true){
                if ($valido[$i]->getProvincia() == $provincias[$x]["name"]) {
                    $total = $provincias[$x]["delegates"];
                    break 2;
                }
            }
        }
    }

    $votosFijo = $votos;

    for ($i = 0; $i < $total; $i++) {
        for ($x = 0; $x < count($votos); $x++) {
            if ($votos[$x] > $votos[$mayor]) {
                $mayor = $x;
            }
        }

        $escanos[$mayor]["escanos"]++;
        $escanos[$mayor]["dividir"]++;


        $votos[$mayor] = $votosFijo[$mayor] / $escanos[$mayor]["dividir"];
    }

    for ($i = 0; $i < count($valido); $i++) {
        $valido[$i]->setEscanos($escanos[$i]["escanos"]);
    }

    for ($i = 0;$i < count($novalido);$i++){
        $valido[] = $novalido[$i];
    }

    return $valido;

}
function LeyHondtPartidos($objetos)
{

    global $provincias;
    global $selectP;


    $seleccionadas = [];

    for ($i = 0; $i < count($objetos); $i++) {
        $filter = FilterPartido($provincias[$i]["name"]);
        $escanos = LeyHondtProvincias($filter);

        for($z = 0; $z < count($escanos);$z++){
            if ($escanos[$z]->getNombre() == $selectP){
                $seleccionadas[] = $escanos[$z];
            }
        }

    }

    return $seleccionadas;

}

function LeyHondtGenerales($objetos)
{

    global $provincias;

    for ($i = 0; $i < count($provincias); $i++) {
        $filter = FilterProvincia($provincias[$i]["name"]);
        $escanos = LeyHondtProvincias($filter);

        for ($z = 0; $z < count($objetos); $z++) {
            for ($x = 0; $x < count($escanos); $x++) {
                if ($escanos[$x]->getPartido() == $objetos[$z]->getNombre()) {
                    $objetos[$z]->setEscanos($objetos[$z]->getEscanos() + $escanos[$x]->getEscanos());
                }
            }
        }

    }


    return $objetos;
}


function MappingProvincia($filtro)
{

    echo "<br><table border = 1>";
    echo "<tr><td>Provincia</td><td>Partido</td><td>Votos</td><td>Escaños</td></tr>";
    for ($i = 0; $i < count($filtro); $i++) {
        echo "<tr><td>";
        echo $filtro[$i]->getNombre();
        echo "</td>";
        echo "<td>";
        echo $filtro[$i]->getPartido();
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
function MappingPartidos($filtro)
{

    echo "<br><table border = 1>";
    echo "<tr><td>Provincia</td><td>Partido</td><td>Votos</td><td>Escaños</td></tr>";
    for ($i = 0; $i < count($filtro); $i++) {
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

function MappingGenerales($filtro)
{

    echo "<br><table border = 1>";
    echo "<tr><td>Circumscripción</td><td>Provincia</td><td>Votos</td><td>Escaños</td></tr>";
    for ($i = 0; $i < count($filtro); $i++) {
        echo "<tr><td>";
        echo "General";
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
            echo('<select name="seleccion">');
            echo('<option value = "">Elige el filtro</option>');
            if ($select == "comunidad") {
                echo('<option value="comunidad" selected>Filtrar por Comunidad</option>');
            } else {
                echo('<option value="comunidad">Filtrar por Comunidad</option>');
            }
            if ($select == "partidos") {
                echo('<option value="partidos" selected>Filtrar por partidos</option>');
            } else {
                echo('<option value="partidos">Filtrar por partidos</option>');
            }
            if ($select == "generales") {
                echo('<option value="generales" selected>Resultados Generales</option>');
            } else {
                echo('<option value="generales">Resultados Generales</option>');
            }
            echo('</select>');
            if ($select == "comunidad") {
                echo '<select name="provincia">';
                for ($i = 0; $i < count($provincias); $i++) {
                    if ($selectC == $provincias[$i]["name"]) {
                        echo '<option value="' . $provincias[$i]["name"] . '" selected> ' . $provincias[$i]["name"] . '</option>';
                    } else {
                        echo '<option value="' . $provincias[$i]["name"] . '"> ' . $provincias[$i]["name"] . '</option>';
                    }
                }
                echo '</select>';
            }
            if ($select == "partidos") {
                echo '<select name="partido">';
                for ($i = 0; $i < count($partidos); $i++) {
                    if ($selectP == $partidos[$i]["name"]) {
                        echo '<option value="' . $partidos[$i]["name"] . '" selected>' . $partidos[$i]["name"] . '</option>';
                    } else {
                        echo '<option value="' . $partidos[$i]["name"] . '"> ' . $partidos[$i]["name"] . '</option>';
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

var_dump($provincias);

global $select;
global $selectC;
global $selectP;

if ($select == "comunidad") {
    $selectC = $_GET["provincia"];
    if ($selectC != "") {
        $filtroC = FilterProvincia($selectC);
        $escanos = LeyHondtProvincias($filtroC);
        MappingProvincia($filtroC);
    }
}
if ($select == "partidos") {
    $selectP = $_GET["partido"];
    if ($selectP != "") {
        $booleano = true;
        $escanos = LeyHondtPartidos($party);
        MappingPartidos($escanos);
    }
}
if ($select == "generales") {
    if ($select != "") {
        $escanos = LeyHondtGenerales($general);
        MappingGenerales($escanos);
    }
}
