<?php
require_once "../constants.php";
require_once "../utils/fetchApi.php";
require_once "../utils/numberFormat.php";

if (isset($_GET["submit"])) {
    $movie = $_GET['movie'];

    $searchApi = "$BASE_URL/search/movie?api_key=$API_KEY&query=$movie";

    $searchMovieData = fetchDataFromAPI($searchApi);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/project/styles/homepage.css">
    <link rel="stylesheet" href="/project/styles/search.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?= $movie ?></title>
</head>

<body>


    <main class="main container pt-4 pb-4">
        <h2 class="display-4 mb-4">Results for <?= $movie ?></h2>
        <div class="movies_container">
            <?php if ($searchMovieData->results): ?>
                <?php foreach ($searchMovieData->results as $movie): ?>
                    <div class="movie-card">
                        <a class="card_link" href="/project/pages/movie-details.php?id=<?php echo $movie->id ?>">
                            <img class="movie-poster" src="https://image.tmdb.org/t/p/w500<?php echo $movie->poster_path; ?>"
                                alt="Movie Poster">
                            <div class="details">
                                <p class="movie-popularity">
                                    <?= $movie->release_date ?>
                                </p>
                                <h2 class="movie-title">
                                    <?= $movie->title ?>
                                </h2>
                                <p class="movie-rating"><img src="/project/assets/images/imdb.svg" alt="">
                                    <?= $movie->vote_average ?>/10
                                </p>
                                </p>
                                <p class="movie-popularity">Popularity:
                                    <?= formatNumberInK($movie->vote_count) ?>
                                </p>
                            </div>
                        </a>
                        <a class="add_to_fav" href="">
                            <img src="/project/assets/images/heart.svg" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No data available.</p>
            <?php endif; ?>
        </div>
    </main>


    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>