<html lang="es">
<head>
    <title>Find N prime numbers</title>
</head>
<body>
<form method="post" action="NumeroPrimos.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
        function CountDivisors($num){

        /*Contador para saber cuantos divisores tiene el numero que le enviamos*/
        $divisores = 0;

        /*Encontrar el numero de divisores*/
        for($i = 1; $i <= $num; $i ++) {
            /*Si el numero es divisible entre el numero que el enviamos se añade un divisor*/
            if ($num % $i == 0) {
                $divisores++;
            }
        }
        /*Devolvemos el numero de divisores que tiene el numero que hemos enviado*/
        return $divisores;
    }

    function isPrimeNum($num){

        /*Variable que sirve para contar las veces que sacamos un numero primo*/
        $count = 0;

        /*Bucle para encontrar los numero primos*/
        for($i = 2; $count < $num;$i++){
            /*Condicion que mostrara el numero si es primo*/
            if (CountDivisors($i) == 2){
                echo '<br>','-',$i;
                $count++;
            }
        }

    }

    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        echo "<b>Los {$num} primeros numeros primos son: </b>";
        isPrimeNum($num);
    }
    ?>
</div>
</body>
</html>
