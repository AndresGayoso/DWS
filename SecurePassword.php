<html lang="es">
<head>
    <title>How secure is my password?</title>
</head>
<body>
<form method="post" action="SecurePassword.php">
    <label>
        Password:
        <input type="text" name="password"/>
    </label>
    <input type="submit"/>
</form>
<div>
    <?php

    function PasswordCheck($passw){
        $letras = 0;
        $datos = count_chars($passw, 1);
        foreach ($datos as $key => $value)
        {
            $key = chr($key);
            $letras++;
        }



    }

    if (isset($_POST["password"])) {
        $passw = ($_POST["password"]);

        PasswordCheck($passw);

    }
    ?>
</div>
</body>
</html>
