<?php
require_once "utils/fetchAPI.php";
require_once "utils/numberFormat.php";
require_once "constants.php";

include("./server/db/connection.php");

session_start();

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
}else{
    header('Location: /project/pages/login.php');
}


$actionMovies = fetchDataFromAPI($actionApi);
$adventureMovies = fetchDataFromAPI($adventureApi);
$comedyMovies = fetchDataFromAPI($comedyApi)

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/homepage.css">
    <title>Homepage</title>
</head>

<body>

    <!-- hero -->
    <section class="hero_wrapper">
        <nav class="container nav_wrapper">
            <div class="logo">
                <img src="/project/assets/images/logo.svg" alt="">
                <h2 class="display-6">MovieBox</h2>
            </div>
            <div class="nav_links">
                <form action="/project/pages/search.php" method="GET">
                    <button class="search_icon" type="submit" name="submit">
                        <img src="/project/assets/icons/search.svg" alt="">
                    </button>
                    <input class="display-6" type="text" name="movie" placeholder="Search movies...">
                </form>
                <a class="display-6" href="">My reviews</a>
                <a class="display-6" href="">Watchlist</a>
                <a class="display-6" href="">Favorites</a>
                <a class="display-6" href="/project/pages/login.php">Login</a>
            </div>
            <h1 class="text-white display-6">Hi,
                <?= $name != null ? $name : " " ?>
            </h1>
        </nav>
    </section>

    <section class="container movies_section">
        <h1 class="movie_heading">Action Movies</h1>
        <div class="cards">

            <?php if ($actionMovies->results): ?>
                <?php foreach ($actionMovies->results as $movie): ?>
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
    </section>



    <section class="container movies_section">
        <h1 class="movie_heading">Comedy Movies</h1>
        <div class="cards">

            <?php if ($comedyMovies->results): ?>
                <?php foreach ($comedyMovies->results as $movie): ?>
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
    </section>



    <section class="container movies_section">
        <h1 class="movie_heading">Adventure Movies</h1>
        <div class="cards">

            <?php if ($adventureMovies->results): ?>
                <?php foreach ($adventureMovies->results as $movie): ?>
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
    </section>



    <footer>

    </footer>



    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>