<?php
$BASE_URL = "https://api.themoviedb.org/3";
$API_KEY = "41bf06bcbce3cfa0a8d11f4c4c8c8473";
$imgURL = "https://image.tmdb.org/t/p/w1280";

$adventureId = "12";
$animationId = "16";
$comedyId = "35";
$actionId = "28";

$actionApi = "$BASE_URL/discover/movie?api_key=$API_KEY&with_genres=$actionId";
$adventureApi = "$BASE_URL/discover/movie?api_key=$API_KEY&with_genres=$adventureId";
$comedyApi = "$BASE_URL/discover/movie?api_key=$API_KEY&with_genres=$comedyId";
?>