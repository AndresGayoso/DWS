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

    /* Encontrar el numero de caracteres(no repetidos)

     foreach ($datos as $key => $value)
        {
            $key = chr($key);
            $letras++;
        }*/

    function PasswordCheck($passw){

        /*Varibles que cambian los segundos a dias,semanas,mese y años*/
        $minutos = 0;
        $hora = 0;
        $dia = 0;
        $mes = 0;
        $año = 0;

        /*Cuanto tiempo en segundo tardan en piratear la contraseña*/
        $tiempo = round(pow(256,strlen($passw))/1000);
        echo $tiempo,"<br>";

        if($tiempo/60/60/24/365 > 1){
            $año = $tiempo/60/60/24/365;
            $tiempo = $año*60*60*24*365;
        }



        //echo $año," años ",$mes," meses ",$dia," dias ",$hora," horas ",$minutos," minutos ",$tiempo," segundos";
        echo $año,"<br>";
        echo $tiempo;

    }

    if (isset($_POST["password"])) {
        $passw = ($_POST["password"]);

        PasswordCheck($passw);

    }
    ?>
</div>
</body>
</html>
