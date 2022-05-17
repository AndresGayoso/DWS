<?php
$seed = 1913; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

//NOTE: Arrays unsorted
$characters = json_decode(file_get_contents($api_url . "characters"), true);
$episodes = json_decode(file_get_contents($api_url . "episodes"), true);
$locations = json_decode(file_get_contents($api_url . "locations"), true);

function getSortedCharactersById($characters)
{
    $count = 0;
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($characters); $j++) {
            if (intval($characters[$i]["id"]) < intval($characters[$j]["id"])) {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
            $count++;
            echo ($count).": (".implode(",",array_column($characters, "id")).");<br>";
        }
    }
    return $characters;
}

function getSortedCharactersByOrigin($characters)
{
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($characters); $j++) {
            if ($characters[$i]["origin"] < $characters[$j]["origin"]) {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
        }
    }
    return $characters;
}

function getSortedCharactersByStatus($characters)
{
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($characters); $j++) {
            if ($characters[$i]["status"] == "Alive" && $characters[$j]["status"] != "Alive") {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
        }
    }

    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($characters); $j++) {
            if ($characters[$i]["status"] == "Dead" && $characters[$j]["status"] == "unknown") {
                $temp = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $temp;
            }
        }
    }
    return $characters;
}

//NOTE: OPTIONAL FUNCTION
function getSortedLocationsById($locations)
{
    for ($i = 0; $i < count($locations); $i++) {
        for ($j = 0; $j < count($locations); $j++) {
            if (intval($locations[$i]["id"]) < intval($locations[$j]["id"])) {
                $temp = $locations[$i];
                $locations[$i] = $locations[$j];
                $locations[$j] = $temp;
            }
        }
    }
    return $locations;
}

//NOTE: OPTIONAL FUNCTION
function getSortedEpisodesById($episodes)
{
    for ($i = 0; $i < count($episodes); $i++) {
        for ($j = 0; $j < count($episodes); $j++) {
            if (intval($episodes[$i]["id"]) < intval($episodes[$j]["id"])) {
                $temp = $episodes[$i];
                $episodes[$i] = $episodes[$j];
                $episodes[$j] = $temp;
            }
        }
    }
    return $episodes;
}

function mapCharacters($characters)
{
    global $sortedLocations;
    global $sortedEpisodes;
    for ($i = 0; $i < count($characters); $i++) {

        if ($characters[$i]["location"] == 0) {
            $characters[$i]["location"] = "Unknown";
        } else {
            $characters[$i]["location"] = $sortedLocations[$characters[$i]["location"] - 1]["name"];
        }

        for ($j = 0; $j < count($sortedLocations); $j++) {
            if ($characters[$i]["origin"] == intval($sortedLocations[$j]["id"])) {
                $characters[$i]["origin"] = $sortedLocations[$j]["name"];
            } elseif ($characters[$i]["origin"] == 0) {
                $characters[$i]["origin"] = "Unknown";
            }
        }

        for ($j = 0; $j < count($characters[$i]["episodes"]); $j++) {
            for ($k = 0; $k < count($sortedEpisodes); $k++) {
                if ($characters[$i]["episodes"][$j] == intval($sortedEpisodes[$k]["id"])) {
                    $characters[$i]["episodes"][$j] = $sortedEpisodes[$k]["name"];
                } elseif ($characters[$i]["episodes"][$j] == 0) {
                    $characters[$i]["episodes"][$j] = "Unknown";
                }
            }
        }
    }
    return $characters;
}

class characters
{
    public $id, $name, $status, $species, $type, $gender, $origin, $location, $image, $created, $episodes;

    function __construct($id, $name, $status, $species, $type, $gender, $origin, $location, $image, $created, $episodes)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->species = $species;
        $this->type = $type;
        $this->gender = $gender;
        $this->origin = $origin;
        $this->location = $location;
        $this->image = $image;
        $this->created = $created;
        $this->episodes = $episodes;
    }

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

//NOTE: Save function returns to variables and then you can use it as globals if needed. Don't edit.
$sortedLocations = getSortedLocationsById($locations);
$sortedEpisodes = getSortedEpisodesById($episodes);
$mappedCharacters = mapCharacters($characters);


?>
