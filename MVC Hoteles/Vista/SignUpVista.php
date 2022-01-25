<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resgistro</title>
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
<div class="container">
    <div class="w-75 mx-auto mt-">
        <form method="post" class="mt-4" autocomplete="off">
            <h2 class="text-dark text-center">Registro</small></h2>
            <div class="form-row justify-content-center">
                <div class="form-group col-lg-10">
                    <label for="inputName">Usuario:</label>
                    <input type="text" name="usuario" class="form-control" placeholder="max 25 caracteres" required>
                </div>
                <div class="form-group col-lg-10">
                    <label for="inputName">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="example@example.ex" required>
                </div>
                <div class="form-group col-lg-5">
                    <label for="inputName">Contraseña:</label>
                    <input type="password" name="contra1" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group col-lg-5 ">
                    <label for="inputName">Confirmar Contraseña:</label>
                    <input type="password" name="contra2" class="form-control" placeholder="Confirm Password" required>
                </div>
                <div class="form-group col-lg-3">
                    <a class="btn btn-success btn-lg" href="../Controlador/LogInControlador.php" role="button">Log In</a>
                </div>
                <div class="form-group col-lg-7 ml-n4">
                    <p>Si ya estas registrado puede hacer click en el boton
                        <button class="btn btn-success btn-sm">Log In</button>
                        , para acceder a tu cuenta.
                    </p>
                </div>
                <div class="form-group col-lg-10">
                    <button class="btn btn-primary btn-lg w-100">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>