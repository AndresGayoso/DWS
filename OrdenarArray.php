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

        $ordenar = array(1,5,8,0,3,2,4,7,9,6);
        $cambiar = 0;
        $z = 1;

        for ($i = 0; $i < count($ordenar); $i++){
            for ($x = 0; $z != 10; $x++) {
                if ($ordenar[$x] > $ordenar[$z]) {
                    $cambiar = $ordenar[$x];
                    $ordenar[$x] = $ordenar[$z];
                    $ordenar[$z] = $cambiar;
                }
                $z++;
            }
            $z = 1;
        }

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