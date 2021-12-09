<?php
include ("DB.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-dark">
    <nav>
        <form action="main.php" method="get">
            <div class="select">
                <?php
                $seleccion = $_GET["seleccion"]
                ?>
                <!--Incluir mas selects con ascendente y descendente (arreglar estos antes)-->
                <select name="seleccion">
                    <option value="todo" <?php echo($seleccion == "" ? "selected" : "") ?>>Todo</option>
                    <option value="año" <?php echo($seleccion == "año" ? "selected" : "") ?>>Año</option>
                    <option value="rating" <?php echo($seleccion == "rating" ? "selected" : "") ?>>Calificación</option>
                    <option value="categoria" <?php echo($seleccion == "categoria" ? "selected" : "") ?>>Categoría</option>
                    <option value="director" <?php echo($seleccion == "director" ? "selected" : "") ?>>Director</option>
                    <option value="edad" <?php echo($seleccion == "edad" ? "selected" : "") ?>>Edad</option>
                </select>
                <i></i>
            </div>
            <?php
                global $Categorias_array;
                global $Directores_array;

                if (isset($_GET["seleccion"])){
                    switch ($seleccion){
                        case "año":
                            $anyo = $_GET["orden"];
                            echo '<div class="select2">';
                            echo '<select name ="orden">';
                            if($anyo == "ascendente"){
                                echo '<option value="ascendente" selected>Ascendente</option>';
                            }else{
                                echo '<option value="ascendente">Ascendente</option>';
                            }
                            if($anyo == "descendente"){
                                echo '<option value="descendente" selected>Descendente</option>';
                            }else{
                                echo '<option value="descendente">Descendente</option>';
                            }
                            echo "</select>";
                            echo "<i></i>";
                            echo "</div>";
                            break;
                        case "rating":
                            $rate = $_GET["orden"];
                            echo '<div class="select2">';
                            echo '<select name ="orden">';
                            if($rate == "ascendente"){
                                echo '<option value="ascendente" selected>Ascendente</option>';
                            }else{
                                echo '<option value="ascendente">Ascendente</option>';
                            }
                            if($rate == "descendente"){
                                echo '<option value="descendente" selected>Descendente</option>';
                            }else{
                                echo '<option value="descendente">Descendente</option>';
                            }
                            echo "</select>";
                            echo "<i></i>";
                            echo "</div>";
                            break;
                        case "categoria":
                            $categoria = $_GET["tipo"];
                            echo '<div class="select2">';
                            echo '<select name ="tipo">';
                            for ($i = 0; $i < count($Categorias_array);$i++){
                                if($categoria == $Categorias_array[$i]["categoria"]){
                                    echo '<option value="'.$Categorias_array[$i]["categoria"].'" selected>'.$Categorias_array[$i]["categoria"].'</option>';
                                }else{
                                    echo '<option value="'.$Categorias_array[$i]["categoria"].'">'.$Categorias_array[$i]["categoria"].'</option>';
                                }
                            }
                            echo "</select>";
                            echo "<i></i>";
                            echo "</div>";
                            break;
                        case "director":
                            $director = $_GET["nombre"];
                            echo '<div class="select2">';
                            echo '<select name ="nombre">';
                            for ($i = 0; $i < count($Directores_array);$i++){
                                if($director == $Directores_array[$i]["nombre"]){
                                    echo '<option value="'.$Directores_array[$i]["nombre"].'" selected>'.$Directores_array[$i]["nombre"].'</option>';
                                }else{
                                    echo '<option value="'.$Directores_array[$i]["nombre"].'">'.$Directores_array[$i]["nombre"].'</option>';
                                }
                            }
                            echo "</select>";
                            echo "<i></i>";
                            echo "</div>";
                            break;
                        case "edad":
                            $edad = $_GET["orden"];
                            echo '<div class="select2">';
                            echo '<select name ="orden">';
                            if($edad == "ascendente"){
                                echo '<option value="ascendente" selected>Ascendente</option>';
                            }else{
                                echo '<option value="ascendente">Ascendente</option>';
                            }
                            if($edad == "descendente"){
                                echo '<option value="descendente" selected>Descendente</option>';
                            }else{
                                echo '<option value="descendente">Descendente</option>';
                            }
                            echo "</select>";
                            echo "<i></i>";
                            echo "</div>";
                            break;
                    }
                }
            ?>
            <button id="submit" type="submit">Filtrar</button>
        </form>
    </nav>
    <div class="cards row">
        <div class="col-sm-6 col-lg-auto">
            <div class="flex-item card">
                <!--imagen portada-->
                <img class="card-img-top" src="https://es.web.img2.acsta.net/pictures/21/08/31/16/41/4145554.jpg">
                <div class="card-body">
                    <!--Texto con la informacion de la pelicula-->
                    <div>
                        <h4 class="card-title">Venom</h4>
                    </div>
                    <div>
                        <p class="card-text">hola esto es una prueba</p>
                    </div>
                    <!--Hacer otro modal con las categorias-->
                    <button type="button" id="boton" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#pelicula_1">Actores</button>
                    <div class="modal fade" id="pelicula_1" tabindex="-1"
                        aria-labelledby="pelicula_1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="pelicula_1">Actores</h5>
                                </div>
                                <div class="modal-body">
                                    <ol class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <!--Nombre actor-->
                                            <div class="imagen-lista">
                                                <!--Imagen del actor-->
                                                <img src="" class="img-fluid">
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                                <div class="modal-footer"><button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
