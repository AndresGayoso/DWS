<?php
include ("DB.php");

function SortByYearAscending(){
    global $conn;

    $sql = "select * from Peliculas
            order by estreno asc;";
    $resultado = $conn->query($sql);
    $arrayPel = $resultado->fetch_all(MYSQLI_ASSOC);

    $arrayPelOBJ = createObjectPelicula($arrayPel);
    $arraySorted = InsertCatActMultDir($arrayPelOBJ);

    return $arraySorted;
}

function SortByYearDescending(){
    global $conn;

    $sql = "select * from Peliculas
            order by estreno desc;";
    $resultado = $conn->query($sql);
    $arrayPel = $resultado->fetch_all(MYSQLI_ASSOC);

    $arrayPelOBJ = createObjectPelicula($arrayPel);
    $arraySorted = InsertCatActMultDir($arrayPelOBJ);

    return $arraySorted;
}

function SortByAgeAscending(){
    global $conn;

    $sql = "select * from Peliculas
            order by edad_min asc;";
    $resultado = $conn->query($sql);
    $arrayPel = $resultado->fetch_all(MYSQLI_ASSOC);

    $arrayPelOBJ = createObjectPelicula($arrayPel);
    $arraySorted = InsertCatActMultDir($arrayPelOBJ);

    return $arraySorted;
}

function SortByAgeDescending(){
    global $conn;

    $sql = "select * from Peliculas
            order by edad_min desc;";
    $resultado = $conn->query($sql);
    $arrayPel = $resultado->fetch_all(MYSQLI_ASSOC);

    $arrayPelOBJ = createObjectPelicula($arrayPel);
    $arraySorted = InsertCatActMultDir($arrayPelOBJ);

    return $arraySorted;
}

function SortByRatingAscending(){
    global $conn;

    $sql = "select * from Peliculas
            order by rating asc;";
    $resultado = $conn->query($sql);
    $arrayPel = $resultado->fetch_all(MYSQLI_ASSOC);

    $arrayPelOBJ = createObjectPelicula($arrayPel);
    $arraySorted = InsertCatActMultDir($arrayPelOBJ);

    return $arraySorted;
}

function SortByRatingDescending(){
    global $conn;

    $sql = "select * from Peliculas
            order by rating desc;";
    $resultado = $conn->query($sql);
    $arrayPel = $resultado->fetch_all(MYSQLI_ASSOC);

    $arrayPelOBJ = createObjectPelicula($arrayPel);
    $arraySorted = InsertCatActMultDir($arrayPelOBJ);

    return $arraySorted;
}

function SortByGender($gender){
    global $conn;

    $sql = "select * from Peliculas";
    $resultado = $conn->query($sql);
    $arrayPel = $resultado->fetch_all(MYSQLI_ASSOC);

    $arrayPelOBJ = createObjectPelicula($arrayPel);
    $arrayPelOBJComplete = InsertCatActMultDir($arrayPelOBJ);

    $arraySorted = [];

    for($i = 0; $i < count($arrayPelOBJComplete);$i++){
        for ($x = 0; $x < count($arrayPelOBJComplete[$i]->getCategorias());$x++){
            if($arrayPelOBJComplete[$i]->getCategorias()[$x] == $gender){
                $arraySorted[] = $arrayPelOBJComplete[$i];
            }
        }
    }

    return $arraySorted;
}

function SortByDirector($director){
    global $conn;

    $sql = "select * from Peliculas";
    $resultado = $conn->query($sql);
    $arrayPel = $resultado->fetch_all(MYSQLI_ASSOC);

    $arrayPelOBJ = createObjectPelicula($arrayPel);
    $arrayPelOBJComplete = InsertCatActMultDir($arrayPelOBJ);

    $arraySorted = [];

    for($i = 0; $i < count($arrayPelOBJComplete);$i++){
        if($arrayPelOBJComplete[$i]->getDirector() == $director){
            $arraySorted[] = $arrayPelOBJComplete[$i];
        }
    }

    return $arraySorted;
}

