<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="estilos/styleUsers.css">
</head>

<body>
<form action="login.php" method="post" autocomplete="off">
    <input class="input posicion1" name="usuario" placeholder="Nombre Usuario" type="text">
    <span class="underline pos1"></span>
    <input class="input posicion2" name="contraseña" placeholder="Contraseña" type="text">
    <span class="underline pos2"></span>
    <input class="login" type="submit" name="submit" value="Iniciar Sesion">
</form>
<a href="movies.php">
    <button class="volver">Volver</button>
</a>
<?php
include("DB.php");
// comprobaciones
$validuser = "";
$validpasswd = "";


$user = $_POST["usuario"];
if (isset($user)) {
    if ($user != "") {
        if (strlen($user) < 25) {
            $validuser = $user;
        } else {
            echo '<p class="p1">*Debe tener como maximo 25 caracteres</p>';
        }
    } else {
        echo '<p class="p1">*No debes dejar la celda vacia</p>';
    }
}

$password = $_POST["contraseña"];
if (isset($password)) {
    if($password != ""){
        $validpasswd = $password;
    }else{
        echo '<p class="p2">*No debes dejar la celda vacia</p>';
    }
}

if (isset($user) && isset($password)) {
    if ($validuser != "" && $validpasswd != "") {
        searchUsuarios($validuser, $validpasswd);
    }
}
?>
</body>

</html>