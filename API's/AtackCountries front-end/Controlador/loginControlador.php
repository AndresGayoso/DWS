<?php


if (isset($_POST["email"]) && isset($_POST["password"]))
{
    $file = file_get_contents("http://localhost/Actividades/API's/AtackCountries%20back-end/Controlador/loginControlador.php?email=".$_POST["email"]."&password=".$_POST["password"]);
    $login_json = json_decode($file);
    if ($login_json->result)
    {
        session_start();
        $_SESSION["LogIn"] = true;
        $_SESSION["userId"] = $login_json->usuario->id;
        $_SESSION["userMail"] = $login_json->usuario->email;
        header("Location: ../Controlador/listCountriesControlador.php");
    }
    else{
        echo('
        <script>
            window.alert("'.$login_json->error.'");
        </script>
        ');
    }
}


include_once "../Vistas/loginVista.php";