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
        $divisores = array();

        for($i = 1; $i < $num; $i ++) {
            if ($num % $i == 0) {
                $divisores[] = $i;
            }
        }
        return $divisores;
    }

    function isPerfectNum($num){

        $count = 0;

        for($i = 1; $count < $num;$i++){
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
