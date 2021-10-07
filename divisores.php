<html lang="es">
<head>
    <title>Divisores</title>
</head>
<body>
<form method="post" action="divisores.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php
    if (isset($_POST["num"])) {
        $num = intval($_POST["num"]);

        for($i = 1; $i <= $num; $i ++) {
            if ($num % $i == 0) {
                echo 'numero ',$i,'<br>';
            }
        }
    }
    ?>
</div>
</body>
</html>