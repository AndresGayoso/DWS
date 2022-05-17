<?php
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elephants.php");
$elephants = json_decode($contents, true);

function getSortedElephantsByNumber($elephants){
    //array que se utiliza de apoyo para ordenar

    $ordenado = array();

    //bucle que ordena el array multidimensional
    for ($i = 0; $i < count($elephants);$i++){
        //bucle que va ordenado los arrays que hay dentro
        for ($x = 0; $x < count($elephants);$x++){
            if (intval($elephants[$i]["number"]) < intval($elephants[$x]["number"])){
                $ordenado = $elephants[$i];
                $elephants[$i] = $elephants[$x];
                $elephants[$x] = $ordenado;
            }
        }
    }
    //Nos devuelve el array ordenado
    return $elephants;


}
?>

<html lang="es">
<head>
    <title>Elephants</title>
    <style>
        table, th, td {
            border: 1px solid black;
            padding-left: 5px;
            padding-right: 5px;
        }
        table {
            border-collapse: collapse;
        }
        thead {
            background-color: aquamarine;
        }
        tbody {
            background-color: aqua;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th colspan="6">Elephants (<?php echo count($elephants) ?>)</th>
    </tr>
    <tr>
        <th colspan="3">Unsorted elephants</th>
        <th colspan="3">Sorted elephants</th>
    </tr>
    <tr>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
        <th>Number</th>
        <th>Name</th>
        <th>Species</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //bucle para completar la tabla con sus valores

    $array = getSortedElephantsByNumber($elephants);
    for ($i = 0; $i < count($elephants);$i++){
        echo '<tr>';
        //desordenada
        echo '<td>';
        echo $elephants[$i]['number'];
        echo '</td>';
        echo '<td>';
        echo $elephants[$i]['name'];
        echo '</td>';
        echo '<td>';
        echo $elephants[$i]['species'];
        echo '</td>';
        //ordenada
        echo '<td>';
        echo $array[$i]['number'];
        echo '</td>';
        echo '<td>';
        echo $array[$i]['name'];
        echo '</td>';
        echo '<td>';
        echo $array[$i]['species'];
        echo '</td>';
        echo '</tr>';
    }

    ?>
    </tbody>
</table>
</body>
</html>
