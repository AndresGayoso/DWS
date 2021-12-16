<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="estilos/styleSignUp.css">
</head>

<body>
    <form action="signup.php" method="post" autocomplete="off">
        <input class="input posicion1" name="usuario" placeholder="Nombre Usuario" type="text">
        <span class="underline pos1"></span>
        <input class="input posicion2" name="contraseña" placeholder="Contraseña" type="text">
        <span class="underline pos2"></span>
        <input class="input posicion3" name="confirmar" placeholder="Confirmar Contraseña" type="text">
        <span class="underline pos3"></span>
        <input class="submit" type="submit" name="submit" value="Registrase">
    </form>
    <a href="movies.php">
        <button class="volver">Volver</button>
    </a>
</body>

</html>