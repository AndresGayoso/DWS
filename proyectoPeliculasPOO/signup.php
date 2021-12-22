<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="estilos/styleUsers.css">
</head>

<body>
    <form action="signup.php" method="post" autocomplete="off">
        <input class="input posicion1" name="usuario" placeholder="Nombre Usuario" type="text" maxlength="25">
        <span class="underline pos1"></span>
        <input class="input posicion2" name="contraseña" placeholder="Contraseña" type="text">
        <span class="underline pos2"></span>
        <input class="input posicion3" name="confirmar" placeholder="Confirmar Contraseña" type="text">
        <span class="underline pos3"></span>
        <input class="submit" type="submit" name="submit" value="Registrarse">
    </form>
    <a href="movies.php">
        <button class="volver">Volver</button>
    </a>
    <?php
    include ("DB.php");
        // comprobaciones
        $validuser = "";
        $validpasswd = "";


        $user = $_POST["usuario"];
        if(isset($user)){
            if ($user != ""){
                $validuser = $user;
            }else{
                echo '<p class="p1">*No debes dejar la celda vacia</p>';
            }
        }
        $password = $_POST["contraseña"];
        $password2 = $_POST["confirmar"];
        if(isset($password)){
            if ($password != "" && $password2 != ""){
                if ($password == $password2){
                    $validpasswd = password_hash($password,PASSWORD_DEFAULT);
                }else{
                    echo '<p class="p3">*La contraseña no coincide</p>';
                }
            }else{
                if ($password == ""){
                    echo '<p class="p2">*No debes dejar la celda vacia</p>';
                }else{
                    echo '<p class="p3">*No debes dejar la celda vacia</p>';
                }
            }
        }
        if(isset($user) && isset($password)){
            if($validuser != "" && $validpasswd != ""){
                InsertUsuarios($validuser,$validpasswd);
            }
        }
    ?>
</body>

</html>