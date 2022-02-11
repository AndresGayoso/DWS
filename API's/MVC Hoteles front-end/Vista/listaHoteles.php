<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Hoteles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/58a9273ff1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/EstiloListaHotel.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-nav">
        <a style="color: white; text-decoration: none" class="nav-item display-3 text-uppercase nav-link ml-5" href="#">Hoteles
            España</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php if (isset($_SESSION["LogIn"])) { ?>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item dropdown">
                    <a style="color: white" class="text-capitalize nav-link dropdown-toggle btn btn-primary" href="#"
                       id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION["user"] ?>
                    </a>
                    <div class=" dropdown-menu dropdown-menu-right bg-primary" aria-labelledby="navbarDropdown">
                        <a style="color: white" class="bg-transparent dropdown-item"
                           href="../Controlador/LogOutControlador.php">Log Out</a>
                    </div>
                </li>

            </ul>
        </div>
    <?php } else { ?>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item">
                    <a style="color:white" class="btn btn-primary nav-link mr-2"
                       href="../Controlador/LogInControlador.php">LogIn</a>
                </li>
                <li class="nav-item">
                    <a style="color:white" class="btn btn-primary nav-link" href="../Controlador/SignUpControlador.php">SignUp</a>
                </li>
            </ul>
        </div>
    <?php } ?>
</nav>
<div class="ml-5 cuerpo">
    <div class="container-fluid">
        <div class="row">
            <div class=" mr-n3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div style="height: 800px;" class=" hoteles overflow-auto">
                    <?php foreach ($hoteles as $hotel) { ?>
                        <div class="mr-1 mb-3 border border-primary media">
                            <img style="height: 150px" class="w-25 mr-3"
                                 src="<?php echo $hotel->imagenes[0]->url ?>" alt="">
                            <div class="media-body">
                                <a class="link-primary text-decoration-none" href="../Controlador/singleHotelControlador.php?HotelId=<?php echo $hotel->id; ?>">
                                    <h3><?php echo $hotel->nombre ?>
                                        <a href="?HotelId=<?php echo $hotel->id; ?>">
                                            <i class="float-right mr-3 mt-1 fas fa-map-pin" <?php echo($HotelId == $hotel->id ? "style='color:red'" : "") ?>
                                               aria-hidden="true"></i>
                                        </a>
                                    </h3>
                                </a>
                                <?php for ($i = 0; $i < $hotel->estrellas; $i++) {
                                    echo '<i class="fas fa-star"></i>';
                                }
                                ?>
                                <h5 class="mt-3 mb-3"><?php echo $hotel->ubicacion ?></h5>
                                <p class="mb-0 float-left"><?php echo $hotel->calle ?>
                                <div class="h6 text-dark align-middle mt-n4 mb-0 rounded text-center float-right mr-3 alert
                            <?php
                                $nota = $hotel->calificacion;
                                if ($nota >= 9) {
                                    echo "alert-success";
                                } elseif ($nota < 9 && $nota >= 8) {
                                    echo "alert-primary";
                                } elseif ($nota < 8 && $nota >= 7) {
                                    echo "alert-warning";
                                } elseif ($nota < 7) {
                                    echo "alert-danger";
                                }
                                ?>
                            "><?php echo $hotel->calificacion ?></div>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <iframe width="100%" height="800" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?q=<?php echo $Latitud ?>,<?php echo $Longitud ?>&hl=es&z=<?php echo $zoom ?>&output=embed"></iframe>
            </div>
        </div>
    </div>
</div>
</body>
</html>

