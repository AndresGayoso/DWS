<?php
include("sort.php");
global $arrayOBJComplete;

$id = $_GET["id"];

for ($i = 0; $i < count($arrayOBJComplete); $i++) {
    if ($arrayOBJComplete[$i]->getId() == $id) {
        insertTrailer($arrayOBJComplete[$i]);
        insertComentario($arrayOBJComplete[$i]);
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
    <title><?php echo $pelicula->getNombre(); ?></title>
    <link rel="stylesheet" href="estilos/styleSingleMovie.css">
    <script src="https://kit.fontawesome.com/58a9273ff1.js" crossorigin="anonymous"></script>
</head>

<body>
<img class="portada" src="<?php echo $pelicula->getPortada() ?>" alt="">
<a href="movies.php">
    <button class="back">Volver</button>
</a>
<div class="titulo">
    <h1><?php echo $pelicula->getNombre() ?></h1>
</div>
<div class="informacion">
    <h3>Duracion: <p><?php echo $pelicula->getDuracion() ?> h</p>
    </h3>
    <h3>Director: <p><?php echo $pelicula->getDirector() ?></p>
    </h3>
    <h3>Estreno: <p><?php echo $pelicula->getEstreno() ?></p>
    </h3>
    <h3>Edad Recomendada: <p><?php echo $pelicula->getEdadMin() ?></p>
    </h3>
    <h3>Calificacion: <p><?php echo $pelicula->getRating() ?>
            <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/Estrella_amarilla.png" alt="">
        </p>
    </h3>
    <h2 class="h2">Actores:</h2>
</div>
<div class="imagenes">
    <?php
    for ($i = 0; $i < count($pelicula->getActores()); $i++) {
        echo('<div class="actor">
            <h3>' . $pelicula->getActores()[$i]["nombre"] . '</h3>
                <img src="' . $pelicula->getActores()[$i]["foto"] . '" alt="">
           </div>');
    }
    ?>
</div>
<div class="trailer">
    <iframe src="<?php echo $pelicula->getTrailer() ?>" title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
</div>
<h2 class="comentariosh2">Comentarios</h2>
<?php
    if ($_SESSION["Login"] == true){
        echo('<form action="#" method="POST">
                <div class="comentPost">
                    <i class="fas fa-user-circle fa-3x imgUser"></i>
                    <h3>'.$_SESSION["user"].'</h3>
                </div>
                <textarea placeholder="A??ade un nuevo comentario" name="textarea" rows="10" cols="100" maxlength="1000"></textarea>
                <input type="submit" class="submit" name="submit" value="Publicar">
              </form>');
    }else{
        echo('<form action="#" method="POST">
                <textarea placeholder="Deber estar registrado para a??adir comentarios" name="textarea" rows="10" cols="100" maxlength="1000" readonly></textarea>
                <input type="submit" class="submit" name="submit" value="Publicar" disabled>
              </form>');
    }
    for ($i = 0; $i < count($pelicula->getComentarios()); $i++) {
        echo('<div class="comentario">
                <div class="user">
                    <i class="fas fa-user-circle fa-3x imgUser"></i>
                    <h3>' . $pelicula->getComentarios()[$i]->getNomUser() . '</h3>
                </div>
                    <p class="textoComentario">' . $pelicula->getComentarios()[$i]->getComentario() . '</p>
                </div>');
    }

    $comentario = $_POST["textarea"];

    if(isset($comentario)){
        if($comentario != ""){
            insertarComentarios($_SESSION["userId"],$pelicula->getId(),$_POST["textarea"]);
        }else{
            echo "<script>
                           window.alert('Debes escribir algun comentario');
                      </script>";
        }
    }

?>
</body>

</html>
