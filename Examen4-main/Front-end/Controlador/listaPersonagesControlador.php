<?php

session_start();

if($_SESSION["login"] != true){
    header("Location: ../Controlador/loginControlador.php");
}

$file = file_get_contents("http://localhost/Examen4/Back-end/Controlador/listaPersonagesControlador.php");
$lista = json_decode($file);

if(isset($_GET["personage"])&&isset($_GET["localizacion"])){
    $file = file_get_contents("http://localhost/Examen4/Back-end/Controlador/listaPersonagesControlador.php?personage=".$_GET["personage"]."&localizacion=".$_GET["localizacion"]);
    $lista = json_decode($file);
}

$characters = $lista->personages;
$episodes = $lista->episodios;

include_once "../Vista/listaPersonages.php";