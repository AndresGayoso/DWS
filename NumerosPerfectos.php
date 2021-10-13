<html lang="es">
<head>
    <title>Find N perfect numbers</title>
</head>
<body>
<form method="post" action="NumerosPerfectos.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php

    function getDivisors($num){

        /*Iniciamos el array*/
        $divisores = array();

        /*Bucle que saca los divisores del numero que le enviamos*/
        for($i = 1; $i < $num; $i ++) {
            /*Si el numero es divisible entre el numero que el enviamos lo añade al array*/
            if ($num % $i == 0) {
                $divisores[] = $i;
            }
        }
        /*Devolvemos el array*/
        return $divisores;
    }

    function isPerfectNum($num){

        /*Variable que sirve para contar las veces que sacamos un numero perfecto*/
        $count = 0;

        /*Bucle para encontrar los numeros perfectos*/
        for($i = 1; $count < $num;$i++){
            /*Sumamos los valores de dentro del array y si es igual a nuestro numero signidica que es perfecto*/
            if (array_sum(getDivisors($i)) == $i){
                echo '<br>','-',$i;
                $count++;
            }
        }
    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        isPerfectNum($num);

    }
    ?>
</div>
</body>
</html>
