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
    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        $count = $num;
        $espacio1 = true;
        $espacio2 = true;

        for ( $i=0; $i<$num; $i++ ) {

            for ($j=0; $j<$i; $j++) {

                if ($espacio1==true){
                    for( $x=0;$x < $count ; $x++ ) {

                        echo "z";

                    }

                    $espacio1 = false;
                }

                echo "*";

            }
            for ($z=0; $z<$i; $z++) {

                echo "*";
                if ($espacio2==true) {
                    for ($y = 0; $y < $count; $y++) {

                        echo "z";

                    }

                    $espacio2 = false;
                }

            }

            echo "<br/>";
            $count--;
            $espacio1 = true;
            $espacio2 = true;
        }

        //<span style='color:skyblue'>

    }
    ?>
</div>
</body>
</html>