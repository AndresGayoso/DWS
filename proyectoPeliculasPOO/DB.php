<?php

include ("Pelicula.php");

//Conectarse a la base de datos
$servername = "sql480.main-hosting.eu";
$username = "u850300514_agayoso";
$password = "x45188189C";
$dbname = "u850300514_agayoso";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//Extraer los objetos que necesito de las tablas

//Peliculas
$sql = "Select * from Peliculas";
$resultadoPel = $conn->query($sql);
$Peliculas_array = $resultadoPel->fetch_all(MYSQLI_ASSOC);

//Categorias
$sql = "Select * from Categorias";
$resultadoCat = $conn->query($sql);
$Categorias_array = $resultadoCat->fetch_all(MYSQLI_ASSOC);

//Actores
$sql = "Select * from Actores";
$resultadoAct = $conn->query($sql);
$Actores_array = $resultadoAct->fetch_all(MYSQLI_ASSOC);

//Multimedia
$sql = "Select * from Multimedia";
$resultadoMult = $conn->query($sql);
$Multimedia_array = $resultadoMult->fetch_all(MYSQLI_ASSOC);

//Directores
$sql = "Select * from Directores";
$resultadoDir = $conn->query($sql);
$Directores_array = $resultadoDir->fetch_all(MYSQLI_ASSOC);

//Categorias-Pelicula
$sql = "Select * from CatPel";
$resultadoCatPel = $conn->query($sql);
$CatPel_array = $resultadoCatPel->fetch_all(MYSQLI_ASSOC);

//Creacion de los objetos
//Objeto Peliculas
function createObjectPelicula($arrayPel)
{
    for ($i = 0; $i < count($arrayPel); $i++) {
        //TP significa para todos los publicos
        if ($arrayPel[$i]["edad_min"] == 0){
            $arrayPel[$i]["edad_min"] = "TP";
        }
        $OBJ_Peliculas[$i] = new Pelicula($arrayPel[$i]['id'], $arrayPel[$i]['nombre'],
            $arrayPel[$i]['duracion'], $arrayPel[$i]['director'], $arrayPel[$i]['rating'],
            $arrayPel[$i]['estreno'], $arrayPel[$i]['edad_min']);
    }
    return $OBJ_Peliculas;
}

//Insertar datos de otras tablas en nuestro objeto

//Extraer el array con las categorias de la pelicula enviada "id"
function arrayCatPel($id){
    global $conn;

    $sql = "select c.categoria from Categorias c
            inner join CatPel ca on c.id = ca.categoria_id
            where ca.pelicula_id =".$id.";";

    $resultado = $conn->query($sql);
    $categorias = $resultado->fetch_all(MYSQLI_ASSOC);

    for($i = 0; $i < count($categorias);$i++){
        $arrayCat[] = $categorias[$i]["categoria"];
    }

    return $arrayCat;
}

///Extraer el array con los actores y sus fotos de la pelicula enviada "id"
function arrayActores($id){
    global $conn;

    $sql = "select a.actor,a.foto from Actores a
            inner join Peliculas p on a.pel_id = p.id
            where p.id =".$id.";";

    $resultado = $conn->query($sql);
    $actores = $resultado->fetch_all(MYSQLI_ASSOC);

    for($i = 0; $i < count($actores);$i++){
        $arrayAct[$i]["nombre"] = $actores[$i]["actor"];
        $arrayAct[$i]["foto"] = $actores[$i]["foto"];
    }

    return $arrayAct;
}

//Extraer un string con la url de la portada de la pelicula enviada "id"
function urlMultimedia($id){
    global $conn;

    $sql = "select m.url from Multimedia m
            inner join Peliculas p on m.pelicula_id = p.id
            where p.id =".$id.";";

    $resultado = $conn->query($sql);
    $url = $resultado->fetch_all(MYSQLI_ASSOC);

    $urlPortada = $url[0]["url"];

    return $urlPortada;
}

///Extraer el array con los directores y sus nombres de la pelicula enviada "id"
function NomDirector($id){
    global $conn;

    $sql = "select d.nombre from Directores d
            inner join Peliculas p on d.id = p.director
            where p.id = ".$id.";";

    $resultado = $conn->query($sql);
    $director = $resultado->fetch_all(MYSQLI_ASSOC);

    $NomDirector = $director[0]["nombre"];

    return $NomDirector;
}


//Variables para llamar a las funciones de los objetos
$arrayPelOBJ = createObjectPelicula($Peliculas_array);

//Insertar el array de categorias en la pelicula enviada "pelicula"
function insertCategoria(Pelicula $pelicula){
    $pelicula->setCategorias(arrayCatPel($pelicula->getId()));
}
//Insertar el array de actores en la pelicula enviada "pelicula"
function insertActores(Pelicula $pelicula){
    $pelicula->setActores(arrayActores($pelicula->getId()));
}
//Insertar el string con la url de la portada en la pelicula enviada "pelicula"
function insertMultimedia(Pelicula $pelicula){
    $pelicula->setPortada(urlMultimedia($pelicula->getId()));
}
//Insertar el string con el nombre del directoir en la pelicula enviada "pelicula"
function insertDirector(Pelicula $pelicula){
    $pelicula->setDirector(NomDirector($pelicula->getId()));
}

//Funcion para rellenar todos los objetos con sus actores, categorias, la portada y director
function InsertCatActMultDir($arrayPelOBJ){
    for ($i = 0; $i < count($arrayPelOBJ);$i++){
        insertCategoria($arrayPelOBJ[$i]);
        insertActores($arrayPelOBJ[$i]);
        insertMultimedia($arrayPelOBJ[$i]);
        insertDirector($arrayPelOBJ[$i]);
    }

    return $arrayPelOBJ;
}

//Objeto Completo

$arrayOBJComplete = InsertCatActMultDir($arrayPelOBJ);