<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $singleHotel->getNombre() ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/58a9273ff1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Estilos/EstiloSingleHotel.css">
    <script src="https://kit.fontawesome.com/58a9273ff1.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Hotel nombre-->
            <a href="../Controlador/listaControlador.php" class="mt-3 ml-2 float-left btn btn-primary" role="button">Volver</a>
            <h1 class="text-center text-white font-weight-bold display-3"><?php echo $singleHotel->getNombre() ?></h1>
        </div>
    </div>
</div>
<!-- Hotel informacion-->
<div class="container-fluid">
    <div class="row">
        <!--Texto-->
        <div class="w-50 row pl-5">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 padding-0">
                <h4 class="font-weight-bold"><i id="location" class="mr-2 fas fa-map-marked"></i>Localizacion
                </h4>
                <h5 class="ml-5"><?php echo $singleHotel->getCalle() ?>
                </h5>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 padding-0">
                <h4 class="font-weight-bold"><i id="rate" class="mr-2 fas fa-users"></i>Calificacion Usuario
                </h4>
                <h5 style="max-width: min-content;"
                    class="font-weight-bold ml-5 alert-success alert"><?php echo $singleHotel->getCalificacion() ?></h5>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 padding-0">
                <h4 class="font-weight-bold"><i id="time" class="mr-2 far fa-clock"></i>Horario</h4>
                <div class="ml-5">
                    <h5>Entrada: <?php echo $singleHotel->getHoraEntrada() ?></h5>
                    <h5>Salida: <?php echo $singleHotel->getHoraSalida() ?></h5>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 padding-0">
                <h4 class="font-weight-bold"><i id="phone" class="mr-2 fas fa-phone-alt"></i>Telefono</h4>
                <h5 class="ml-5"><?php echo $singleHotel->getTelefono() ?></h5>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 padding-0">
                <h4 class="font-weight-bold"><i id="info" class="mr-2 fas fa-info-circle"></i>Informacion</h4>
                <h5 class="ml-5 text-justify"> <?php echo $singleHotel->getDescripcion() ?>
                </h5>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-sm-12 pl-5">
            <h4 class="font-weight-bold"><i id="habitacion" class="mr-2 fas fa-bed"></i>Habitaciones</h4>
            <div style="height: 500px;" class=" w-75 habitaciones overflow-auto">
                <?php foreach ($singleHotel->getHabitaciones() as $habitacion) {?>
                <div class="mr-1 mb-3 border border-primary media">
                    <img style="height: 130px" class="w-25 mr-3"
                         src="<?php echo $habitacion->getImagenes()[0]->getUrl() ?>" alt="Imagen habitacion">
                    <div class="media-body">
                        <h3 class="font-weight-bold mt-2"><?php echo $habitacion->getNombre() ?></h3>
                        <h5 class="mt-2"><?php echo $habitacion->getPersonas() ?> personas</h5>
                        <h5 class="mt-2 float-left">Precio:</h5>
                        <h5 style="max-width: min-content;"
                            class=" ml-2 float-left font-weight-bold alert-primary p-2 rounded"><?php echo $habitacion->getPrecio()."€"?></h5>
                        <a class="mr-2 btn btn-primary float-right" href="#" role="button">Reservar</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Imagenes -->
<h4 class="font-weight-bold pl-5"><i id="images" class="mr-2 fas fa-images"></i>Galeria</h4>
<div class="container-fluid pb-2 pl-lg-5">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex">
            <div class="carousel-container position-relative row">
                <div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-slide-number="0">
                            <img src="<?php echo $singleHotel->getImagenes()[0]->getUrl() ?>" class="w-100 principal" alt="..."
                                 data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                        </div>
                        <?php for ($i = 1; $i < count($singleHotel->getImagenes());$i++){ ?>
                        <div class="carousel-item" data-slide-number="<?php echo $i ?>">
                            <img src="<?php echo $singleHotel->getImagenes()[$i]->getUrl() ?>" class="w-100 principal" alt="..."
                                 data-type="image" data-toggle="lightbox" data-gallery="example-gallery">
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div id="carousel-thumbs" class="carousel slide w-100" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row mx-0">
                                <?php for($i = 0; $i < count($singleHotel->getImagenes());$i++) { ?>
                                <div id="carousel-selector-<?php echo $i ?>" class="thumb col-4 col-sm-2 px-1 py-2 selected"
                                     data-target="#myCarousel" data-slide-to="<?php echo $i ?>">
                                    <img src="<?php echo $singleHotel->getImagenes()[$i]->getUrl() ?>" class="img-fluid h-100 secundaria"
                                         alt="...">
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carousel-thumbs"
                            data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carousel-thumbs"
                            data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12 d-flex">
            <iframe class="w-75" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    src="https://maps.google.com/maps?q=<?php echo $singleHotel->getLatitud() ?>,<?php echo $singleHotel->getLongitud() ?>&hl=es&z=15&output=embed"></iframe>
        </div>
    </div>
</div>
<script>
    $('#myCarousel').carousel({
        interval: 5000
    });
    $('#carousel-thumbs').carousel({
        interval: false
    });

    $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr('id');
        var id = parseInt(id_selector.substr(id_selector.lastIndexOf('-') + 1));
        $('#myCarousel').carousel(id);
    });

    if ($(document).width() < 575) {
        $('#carousel-thumbs .row div:nth-child(4)').each(function () {
            var rowBoundary = $(this);
            $('<div class="row mx-0">').insertAfter(rowBoundary.parent()).append(rowBoundary.nextAll()
                .addBack());
        });
        $('#carousel-thumbs .carousel-item .row:nth-child(even)').each(function () {
            var boundary = $(this);
            $('<div class="carousel-item">').insertAfter(boundary.parent()).append(boundary.nextAll()
                .addBack());
        });
    }

    if ($('#carousel-thumbs .carousel-item').length < 2) {
        $('#carousel-thumbs [class^=carousel-control-]').remove();
        $('.machine-carousel-container #carousel-thumbs').css('padding', '0 5px');
    }

    $('#myCarousel').on('slide.bs.carousel', function (e) {
        var id = parseInt($(e.relatedTarget).attr('data-slide-number'));
        $('[id^=carousel-selector-]').removeClass('selected');
        $('[id=carousel-selector-' + id + ']').addClass('selected');
    });

    $('#myCarousel').on("swipe", ({
        fallbackToMouseEvents: true,
        swipeLeft: function (e) {
            $('#myCarousel').carousel('next');
        },
        swipeRight: function (e) {
            $('#myCarousel').carousel('prev');
        },
        allowPageScroll: 'vertical',
        preventDefaultEvents: false,
        threshold: 75
    }));

    $('#myCarousel .carousel-item img').on('click', function (e) {
        var src = $(e.target).attr('data-remote');
        if (src) $(this).ekkoLightbox();
    });
</script>
</body>

</html>