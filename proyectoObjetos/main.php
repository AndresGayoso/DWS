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

function LeyHondt($partidos){

    $escanos = [];
    $votos = [];

    for($i = 0;$i < count($partidos);$i++){
        $escanos[] = 0;
        $votos[] = $partidos[$i]->getVotos();
    }

    var_dump($escanos);
    var_dump($votos);

    /*
    $mayor = 0;

    for ($i = 0; $i < 7;$i++){
        for ($x = 0; $x < count($votos);$x++){
            if($votos[$x]->getVotos() > $votos[$mayor]){
                $mayor = $x;
            }
        }

        $partido[$mayor]++;

        $prueba[$mayor] = $prueba[$mayor] / 2;

    }

    return $partido;
*/


}



function Mapping(){

    global $filtro;

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
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";


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
                    echo '<option value="'.$provincias[$i]["name"].'"> '.$provincias[$i]["name"].'</option>';
                }
                ?>
        </select>
        <button type="submit">Mostrar</button>
    </form>
</div>
</body>
</html>
<?php
$select = $_GET["select"];
if($select != ""){
    $filtro = FilterProvincia($select);
    echo "<pre>";
    LeyHondt($filtro);
    echo "</pre>";
}else{
    echo "   ";
}
