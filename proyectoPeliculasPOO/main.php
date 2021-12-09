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
        <form action="">
            <div class="select">
                <!--Incluir mas selects con ascendente y descendente (arreglar estos antes)-->
                <select name="seleccion">
                    <option value="todo" <?php echo($seleccion == "" ? "selected" : "") ?>>Todo</option>
                    <option value="categoria" <?php echo($seleccion == "categoria" ? "selected" : "") ?>>Categoría</option>
                    <option value="año" <?php echo($seleccion == "año" ? "selected" : "") ?>>Año</option>
                    <option value="rating" <?php echo($seleccion == "rating" ? "selected" : "") ?>>Calificación</option>
                    <option value="edad" <?php echo($seleccion == "edad" ? "selected" : "") ?>>Edad</option>
                </select>
                <i></i>
            </div>
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
