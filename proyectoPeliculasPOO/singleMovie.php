<?php
include("sort.php");
global $arrayOBJComplete;

$id = $_GET["id"];

for ($i = 0; $i < count($arrayOBJComplete); $i++) {
    if ($arrayOBJComplete[$i]->getId() == $id) {
        $pelicula = $arrayOBJComplete[$i];
        break;
    }
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pelicula->getNombre();?></title>
    <link rel="stylesheet" href="estilos/styleSingleMovie.css">
</head>

<body>
<img class="portada" src="<?php echo $pelicula->getPortada()?>" alt="">
<a href="movies.php">
    <button class="back">Volver</button>
</a>
<div class="titulo">
    <h1><?php echo $pelicula->getNombre()?></h1>
</div>
<div class="informacion">
    <h3>Duracion: <p><?php echo $pelicula->getDuracion()?> h</p>
    </h3>
    <h3>Director: <p><?php echo $pelicula->getDirector()?></p>
    </h3>
    <h3>Estreno: <p><?php echo $pelicula->getEstreno()?></p>
    </h3>
    <h3>Edad Recomendada: <p><?php echo $pelicula->getEdadMin()?></p>
    </h3>
    <h3>Calificacion: <p><?php echo $pelicula->getRating()?>
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/Estrella_amarilla.png" alt="">
        </p>
    </h3>
    <h2 class="h2">Actores:</h2>
</div>
<div class="imagenes">
    <?php
    for ($i = 0; $i < count($pelicula->getActores());$i++){
    echo ('<div class="actor">
            <h3>'.$pelicula->getActores()[$i]["nombre"].'</h3>
                <img src="'.$pelicula->getActores()[$i]["foto"].'" alt="">
           </div>');
    }
    ?>
</div>
<div class="trailer">
    <iframe src="<?php echo $pelicula->getTrailer()?>" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
</div>
<h2>Comentarios</h2>
<div class="comentarios">
    <img class="imgUser" src="http://assets.stickpng.com/thumbs/585e4bf3cb11b227491c339a.png">
    <h3 class="user">Andres</h3>
    <p class="comentario">Esta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfecta</p>
</div>
<div class="comentarios">
    <img class="imgUser" src="http://assets.stickpng.com/thumbs/585e4bf3cb11b227491c339a.png">
    <h3 class="user">Andres</h3>
    <p class="comentario">Esta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfecta</p>
</div>
<div class="comentarios">
    <img class="imgUser" src="http://assets.stickpng.com/thumbs/585e4bf3cb11b227491c339a.png">
    <h3 class="user">Andres</h3>
    <p class="comentario">Esta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfectaEsta pelicula me ha parecido perfecta</p>
</div>
</body>

</html>
