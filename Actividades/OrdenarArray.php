<html lang="es">
<head>
    <title>Divisores</title>
</head>
<body>
<form method="post" action="OrdenarArray.php">
    <input type="submit" name="btn"/>
</form>
<div>
    <?php

    function OrdenarArray(){
        /*Array con numeros desordenados*/
        $ordenar = array(1,5,8,0,3,2,4,7,9,6);
        /*Variable que se utiliza de apoyo para cambiar un numero de posicion*/
        $cambiar = 0;

        /*Bucle principal para ordenadar el array comopleto*/
        for ($i = 0; $i < count($ordenar); $i++){
            /*Bucle que va ordenando los numero*/
            for ($x = 0; $x < count($ordenar); $x++) {
                /*Condicion que si el numero siguiente es menor lo cambie por el actual*/
                if ($ordenar[$i] < $ordenar[$x]) {
                    $cambiar = $ordenar[$i];
                    $ordenar[$i] = $ordenar[$x];
                    $ordenar[$x] = $cambiar;
                }

            }
        }
        /*Mostrar array*/
        var_dump($ordenar);

    }



    if (isset($_POST["btn"])) {
        $num = intval($_POST["btn"]);

        OrdenarArray();


    }
    ?>
</div>
</body>
</html>