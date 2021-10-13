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
        $dias = 0;
        $semana = 0;
        $mes = 0;
        $año = 0;

        /*Cuanto tiempo en segundo tardan en piratear la contraseña*/
        $tiempo = round(pow(256,strlen($passw))/1000);

        while($tiempo > 60){

            if($tiempo > 60){
                $minutos++;
                $tiempo -= 60;
            }

            if($minutos == 60 ){
                $minutos = 0;
                $hora++;
            }

            if($hora == 24){
              $hora = 0;
              $dia++;
              $dias++;
            }

            if($dia == 7){
                $semana++;
                $dia = 0;
            }

            if($dias == 31){
                $mes++;
                $dias = 0;
            }

            if($mes == 12){
                $año++;
                $mes = 0;
            }

        }

        echo $año," años ",$mes," meses ",$semana," semanas ",$dia," dias ",$hora," horas ",$minutos," minutos ",$tiempo," segundos";

    }

    if (isset($_POST["password"])) {
        $passw = ($_POST["password"]);

        PasswordCheck($passw);

    }
    ?>
</div>
</body>
</html>
