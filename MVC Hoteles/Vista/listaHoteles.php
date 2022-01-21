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
<div class="container">
    <div class="text-center">
        <div class="text-white">
            <h1 class="display-3 text-uppercase">hoteles españa</h1>
        </div>
    </div>
</div>
<div class="mt-5 ml-5 cuerpo">
    <div class="container-fluid">
        <div class="row">
            <div class=" mr-n3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div style="height: 800px;" class=" hoteles overflow-auto">
                    <?php foreach ($hoteles as $hotel) { ?>
                    <div class="mr-1 mb-3 border border-primary media">
                        <img style="height: 150px" class="w-25 mr-3" src="<?php echo $hotel->getImagenes()[0]->getUrl()?>" alt="">
                        <div class="media-body">
                            <h3><?php echo $hotel->getNombre()?>
                                <a href="?HotelId=<?php echo $hotel->getId(); ?>">
                                    <i class="float-right mr-3 mt-1 fas fa-map-pin" <?php echo($HotelID == $hotel->getId() ? "style='color:red'" : "") ?>
                                       aria-hidden="true"></i>
                                </a>
                            </h3>
                            <?php for($i = 0; $i < $hotel->getEstrellas();$i++){
                                echo '<i class="fas fa-star"></i>';
                            }
                            ?>
                            <h5 class="mt-3 mb-3"><?php echo $hotel->getUbicacion() ?>></h5>
                            <p class="mb-0 float-left"><?php echo $hotel->getCalle() ?>
                            <div class="nota align-middle mt-n3 mb-0 rounded text-center float-right mr-3
                            <?php
                            $nota = $hotel->getCalificacion();
                            if($nota >= 9){
                                echo "bg-success";
                            }elseif ($nota < 9 && $nota >= 8){
                                echo "bg-primary";
                            }elseif ($nota < 8 && $nota >= 7){
                                echo "bg-warning";
                            }elseif ($nota < 7){
                                echo "bg-danger";
                            }
                            ?>
                            "><?php echo $hotel->getCalificacion() ?></div>
                            </p>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <iframe width="100%" height="800" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?q=<?php echo $Latitude ?>,<?php echo $Longitude ?>&hl=es&z=<?php echo $zoom ?>&output=embed"></iframe>
            </div>
        </div>
    </div>
</div>
</body>
</html>

