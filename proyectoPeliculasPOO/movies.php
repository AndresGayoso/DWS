<?php
error_reporting(0);
include ("map.php");
include ("sort.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <script src="https://kit.fontawesome.com/58a9273ff1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos/styleMovies.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-dark">
    <nav>
        <form action="movies.php" method="get">
            <div class="select">
                <?php
                $seleccion = $_GET["seleccion"]
                ?>
                <!--Incluir mas selects con ascendente y descendente (arreglar estos antes)-->
                <select name="seleccion">
                    <option value="" <?php echo($seleccion == "" ? "selected" : "") ?>>Todo</option>
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
                global $arrayOBJComplete;

                $selectedPelId = "";

                if (isset($_GET["seleccion"])){
                    switch ($seleccion){
                        case "año":
                            $anyo = $_GET["ordenaño"];
                            echo '<div class="select2">';
                            echo '<select name ="ordenaño">';
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
                            $rate = $_GET["ordenrate"];
                            echo '<div class="select2">';
                            echo '<select name ="ordenrate">';
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
                            $edad = $_GET["ordenedad"];
                            echo '<div class="select2">';
                            echo '<select name ="ordenedad">';
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
            $arraySorted = $arrayOBJComplete;

            if ($seleccion == "año"){

                $anyo = $_GET["ordenaño"];
                if($anyo == "ascendente"){
                    $arraySorted = SortByYearAscending();
                }
                if($anyo == "descendente"){
                    $arraySorted = SortByYearDescending();
                }
            }
            if ($seleccion == "rating"){
                $rate = $_GET["ordenrate"];
                if($rate == "ascendente"){
                    $arraySorted = SortByRatingAscending();
                }
                if($rate == "descendente"){
                    $arraySorted = SortByRatingDescending();
                }
            }
            if ($seleccion == "categoria"){
                $categoria = $_GET["tipo"];
                if($categoria != ""){
                    $arraySorted = SortByGender($categoria);
                }
            }
            if ($seleccion == "director"){
                $director = $_GET["nombre"];
                if($director != ""){
                    $arraySorted = SortByDirector($director);
                }
            }
            if ($seleccion == "edad"){
                $rate = $_GET["ordenedad"];
                if($rate == "ascendente"){
                    $arraySorted = SortByAgeAscending();
                }
                if($rate == "descendente"){
                    $arraySorted = SortByAgeDescending();
                }
            }
            ?>
            <button id="submit" type="submit">Filtrar</button>
        </form>
        <a href="signup.php">
            <button id="users" class="posSignup">Sign Up</button>
        </a>
        <a href="login.php">
            <button id="users" class="posLogin">Log In</button>
        </a>
    </nav>
    <div style="margin-top: 3%;" class="card-group">
       <?php

       for ($i = 0; $i < count($arraySorted);$i++){
           MapObject($arraySorted[$i]);
       }
       ?>
    </div>
</body>
</html>

<?php
