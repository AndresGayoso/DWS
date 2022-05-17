<?php
$seed = 8189; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

//NOTE: Arrays unsorted
$characters = json_decode(file_get_contents($api_url . "characters"), true);
$episodes = json_decode(file_get_contents($api_url . "episodes"), true);
$locations = json_decode(file_get_contents($api_url . "locations"), true);

function getSortedCharactersById($characters)
{
    //TODO: Your code here.
    $ordenar = [];


    for ($i = 0; $i < count($characters); $i++){
        for ($j = 0; $j < count($characters); $j++){
            if ($characters[$i]["id"] < $characters[$j]["id"]){
                $ordenar = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $ordenar;
            }
        }
    }
    return $characters;

}

function getSortedCharactersByOrigin($characters)
{
    //TODO: Your code here.
    for ($i = 0; $i < count($characters); $i++){
        for ($j = 0; $j < count($characters); $j++){
            if ($characters[$i]["origin"] < $characters[$j]["origin"]){
                $ordenar = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $ordenar;
            }
        }
    }
    return $characters;
}

function getSortedCharactersByStatus($characters)
{
    //TODO: Your code here.
    for ($i = 0; $i < count($characters); $i++){
        for ($j = 0; $j < count($characters); $j++){
            if ($characters[$j]["status"] != "Alive" ){
                $ordenar = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $ordenar;
            }
        }
    }
    return $characters;

}

//NOTE: OPTIONAL FUNCTION
function getSortedLocationsById($locations)
{
    //TODO: Your code here.
    $ordenar = [];

    for ($i = 0; $i < count($locations);$i++){
        for ($j = 0; $j < count($locations);$j++){
            if ($locations[$i]["id"] < $locations[$j]["id"]){
                $ordenar = $locations[$i];
                $locations[$i] = $locations[$j];
                $locations[$j] = $ordenar;
            }
        }
    }
    return $locations;
}

//NOTE: OPTIONAL FUNCTION
function getSortedEpisodesById($episodes)
{
    //TODO: Your code here.
}

function mapCharacters($characters)
{
    //TODO: Your code here

    global $locations;
    global $episodes;

    for ($i = 0; $i < count($characters);$i++){
        for($x = 0; $x < count($locations);$x++){
            if ($characters[$i]["origin"] == $locations[$x]["id"]){
                $characters[$i]["origin"] = $locations[$x]["name"];
            }
            if($characters[$i]["origin"] == 0){
                $characters[$i]["origin"] = "unknown";
            }
        }
    }
    for ($i = 0; $i < count($characters);$i++){
        for($x = 0; $x < count($locations);$x++){
            if ($characters[$i]["location"] == $locations[$x]["id"]){
                $characters[$i]["location"] = $locations[$x]["name"];
            }
            if($characters[$i]["location"] == 0){
                $characters[$i]["location"] = "unknown";
            }
        }
    }
    for ($j = 0;$j < count($characters);$j++) {
        for ($i = 0; $i < count($characters[$j]["episodes"]); $i++) {
            for ($x = 0; $x < count($episodes); $x++) {
                if ($characters[$j]["episodes"][$i] == $episodes[$x]["id"]) {
                    $characters[$j]["episodes"][$i] = $episodes[$x]["name"];
                }
                if($characters[$i]["episodes"] == 0){
                    $characters[$i]["episodes"] = "unknown";
                }
            }
        }
    }
    return $characters;
}

//NOTE: Function to render each character card HTML. Don't edit.
function renderCard($character)
{
    $ch = curl_init('https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?data=render');
    $data = array("character" => $character);
    $postData = json_encode($data);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//NOTE: $sortingCriteria receive the sorting criteria of the form. Don't edit
$sortingCriteria = "";
if (isset($_GET["sortingCriteria"])) {
    $sortingCriteria = $_GET["sortingCriteria"];
    switch ($sortingCriteria) {
        case "id":
            $characters = getSortedCharactersById($characters);
            break;
        case "origin":
            $characters = getSortedCharactersByOrigin($characters);
            break;
        case "status":
            $characters = getSortedCharactersByStatus($characters);
            break;
    }
}

//NOTE: Save function returns to variables and then you can use it as globals if needed. Don't edit.
$sortedLocations = getSortedLocationsById($locations);
$sortedEpisodes = getSortedEpisodesById($episodes);
$mappedCharacters = mapCharacters($characters);

?>

<html lang="es">
<head>
    <title>RMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="Examen.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option <?php echo($sortingCriteria == "" ? "selected" : "") ?> value="unsorted">Sorting criteria
                    </option>
                    <option <?php echo($sortingCriteria == "id" ? "selected" : "") ?> value="id">Id</option>
                    <option <?php echo($sortingCriteria == "origin" ? "selected" : "") ?> value="origin">Origin</option>
                    <option <?php echo($sortingCriteria == "status" ? "selected" : "") ?> value="status">Status</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<main role="main">
    <div class="py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php
                //TODO: Your code here.
                for ($i = 0; $i < count($mappedCharacters);$i++){
                    echo ('<div class="col-md-4 col-sm-12 col-xs-12">');
                    echo ('<div class="card mb-4 box-shadow bg-light">');
                    echo ('<img class="card-img-top" src="'.$mappedCharacters[$i]["image"].'" alt="'.$mappedCharacters[$i]["image"].'">');
                    echo ('<div class="card-body">');
                    echo ('<h5 class="card-title">'.$mappedCharacters[$i]["name"].'</h5>');
                    echo ('<div class="alert alert-success" style="padding:0;" role="alert">'.$mappedCharacters[$i]["status"].'-'.$mappedCharacters[$i]["species"].'</div>');
                    echo ('<form>');
                    echo ('<div class="mb-3" style="margin-bottom:0!important;">');
                    echo ('<label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Origin:</strong></label>');
                    echo ('<div id="emailHelp" class="form-text" style="margin-top:0;">'.$mappedCharacters[$i]["origin"].'</div>');
                    echo ('</div>');
                    echo ('<div class="mb-3">');
                    echo ('<label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Last known location:</strong></label>');
                    echo ('<div id="emailHelp" class="form-text" style="margin-top:0;">'.$mappedCharacters[$i]["location"].'</div>');
                    echo ('</div>');
                    echo ('</form>');
                    echo ('<div class="d-flex justify-content-between align-items-center">');
                    echo ('<div class="btn-group">');
                    echo ('<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#characterModal_'.$mappedCharacters[$i]["id"].'">View episodes</button>');
                    echo ('<div class="modal fade" id="characterModal_'.$mappedCharacters[$i]["id"].'" tabindex="-1" aria-labelledby="characterModalLabel_115" aria-hidden="true">');
                    echo ('<div class="modal-dialog">');
                    echo ('<div class="modal-content">');
                    echo ('<div class="modal-header">');
                    echo ('<h5 class="modal-title" id="characterModalLabel_'.$mappedCharacters[$i]["id"].'">Episodes list</h5>');
                    echo ('<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>');
                    echo ('</div>');
                    echo ('<div class="modal-body">');
                    echo ('<ol class="list-group">');
                    for ($j = 0; $j < count($mappedCharacters[$i]["episodes"]);$j++){
                        echo ('<li class="list-group-item">'.$mappedCharacters[$i]["episodes"][$j].'</li>');
                    }
                    echo ('</ol>');
                    echo ('</div>');
                    echo ('<div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div>');
                    echo ('</div>');
                    echo ('</div>');
                    echo ('</div>');
                    echo ('</div>');
                    echo ('<small class="text-muted">'.$mappedCharacters[$i]["created"].'</small>');
                    echo ('</div>');
                    echo ('</div>');
                    echo ('</div>');
                    echo ('</div>');


                }
                /*
                 Opcion de mostrar alternativa:
                 echo ('<pre>');
                echo var_dump($mappedCharacters);
                echo ('</pre>');
                 */
                ?>
            </div>
        </div>
    </div>

</main>
</body>
</html>
