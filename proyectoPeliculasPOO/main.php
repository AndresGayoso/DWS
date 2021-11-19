<?php
$api_url = "https://api.themoviedb.org/3/movie/550?api_key={api_key}&callback=test";

$charactersjson = json_decode(file_get_contents($api_url . "characters"), true);