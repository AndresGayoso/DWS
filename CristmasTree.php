<html lang="es">
<head>
    <title>Christmas Tree</title>
</head>
<body>
<form method="post" action="CristmasTree.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div style="background-color: skyblue; width:min-content">
    <?php

    function ChristmasTree($num){

        /*Variable que sirve de apoyo para los bucles de los espacios*/
        $count = $num;

        /*Bucle principal que define las filas que tendra el arbol*/
        for ( $i=1; $i<=$num; $i++ ) {

            /*Bucle que muestra los espacio(son estrellas pintadas del color de fondo)*/
            for ($j=0; $j<$count; $j++) {

                echo "<span style='color:skyblue'>*";

            }

            /*Bucle que muestra las estrellas*/
            for ($j=0; $j<$i; $j++) {

                echo "<span style='color:black'>*";

                /*Condicion que se ejecuta despues de mostrar la primera estrella*/
                if ($j >= 1){
                    echo "<span style='color:black'>*";
                }

            }

            /*Bucle que muestra los espacio(son estrellas pintadas del color de fondo)*/
            for ($j=0; $j<$count; $j++) {

                echo "<span style='color:skyblue'>*";

            }

            echo "<br/>";
            $count--;
        }

    }


    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        ChristmasTree($num);

    }
    ?>
</div>
</body>
</html>