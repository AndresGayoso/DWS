<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</head>
<style>
    body {
        background: rgb(41, 184, 229);
        background: linear-gradient(90deg, rgba(41, 184, 229, 1) 0%, rgba(165, 225, 244, 1) 30%, rgba(169, 226, 245, 1) 70%, rgba(41, 184, 229, 1) 100%);
    }

    form {
        background: rgb(255, 255, 255, 0.6);
        border-radius: 3%;
    }
</style>

<body>
<a class="btn btn-primary float-left ml-3" href="../Controlador/singleHotelControlador.php?HotelId=<?php echo $_GET["HotelId"] ?>" role="button">Volver</a>
<?php if(isset($_SESSION["LogIn"])) {?>
<div class="dropdown">
    <a class="mr-2 btn btn-primary dropdown-toggle float-right text-capitalize" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION["user"] ?>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="../Controlador/LogOutControlador.php">LogOut</a>
    </div>
</div>
<?php }else{ ?>
    <a class="btn btn-primary float-right mr-3" href="../Controlador/SignUpControlador.php" role="button">SignUp</a>
    <a class="btn btn-primary float-right mr-3" href="../Controlador/LogInControlador.php" role="button">LogIn</a>
<?php } ?>
<div class="container">
    <div class="w-75 mx-auto mt-1">
        <form method="post" class="mt-4" autocomplete="off">
            <h2 class="text-dark text-center">Reservar</small></h2>
            <div class="form-row justify-content-center">
                <div class="form-group col-lg-10">
                    <label for="inputName">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="example@example.ex" required>
                </div>
                <div class="form-group col-lg-5">
                    <label for="inputName">Entrada:</label>
                    <input type="date" name="entrada" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group col-lg-5 ">
                    <label for="inputName">Salida:</label>
                    <input type="date" name="salida" class="form-control" placeholder="Confirm Password" required>
                </div>
                <?php if(isset($_SESSION["LogIn"])) {?>
                    <div class="form-group col-lg-10">
                        <button class="btn btn-primary btn-lg w-100">Reservar</button>
                    </div>
                <?php }else{ ?>
                    <h3 class="rounded p-2 bg-info text-uppercase text-light">Debes haber iniciado sesion para reservar</h3>
                <?php } ?>
            </div>
        </form>
    </div>
</div>
</body>

</html>