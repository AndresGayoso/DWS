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
        /*Variable que se utiliza para ver el numero siguiente al que estamos mostrando*/
        $z = 1;

        /*Bucle principal para ordenadar el array comopleto*/
        for ($i = 0; $i < count($ordenar); $i++){
            /*Bucle que va ordenando los numero*/
            for ($x = 0; $z != 10; $x++) {
                /*Condicion que si el numero siguiente es menor lo cambie por el actual*/
                if ($ordenar[$x] > $ordenar[$z]) {
                    $cambiar = $ordenar[$x];
                    $ordenar[$x] = $ordenar[$z];
                    $ordenar[$z] = $cambiar;
                }
                $z++;
            }
            $z = 1;
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