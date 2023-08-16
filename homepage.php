<?php
require_once "utils/fetchAPI.php";
require_once "utils/numberFormat.php";
require_once "constants.php";
require_once "utils/checkInFavorites.php";

include("./server/db/connection.php");

session_start();

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
} else {
    header('Location: /project/pages/login.php');
}


$actionMovies = fetchDataFromAPI($actionApi);
$adventureMovies = fetchDataFromAPI($adventureApi);
$comedyMovies = fetchDataFromAPI($comedyApi);

$firstMovie = $actionMovies->results[0];

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
    <link rel="stylesheet" href="./styles/movie-details.css">
    <title>Homepage</title>
</head>

<body>

    <!-- hero -->
    <section
        style="background:url('<?php echo $imgURL . $firstMovie->backdrop_path; ?>'); background-position: center; background-repeat: no-repeat; background-size: cover;"
        class="hero_wrapper">


        <div class="dim_wrapper">
            <nav class="container nav_wrapper">
                <div class="logo">
                    <img src="/project/assets/images/logo.svg" alt="">
                    <h2 class="display-6">MovieBox</h2>
                </div>`
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
                    <?php if (!$name) {
                        echo '<a class="display-6" href="/project/pages/login.php">Login</a>';
                    } else {
                        echo '<a class="display-6" href="/project/server/logout.php">Logout</a>';
                    }
                    ?>
                </div>
                <h1 class="text-white display-6">Hi,
                    <?= $name != null ? $name : " " ?>
                </h1>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-5 movie_details">
                        <h1>
                            <?php echo $firstMovie->title; ?>
                        </h1>
                        <div class="imdb_rating">
                            <img src="/project/assets/images/imdb.svg" alt="imdb">
                            <p>
                                <?php echo $firstMovie->vote_average; ?>/10
                            </p>
                        </div>
                        <p>
                            <?php echo $firstMovie->overview; ?>
                        </p>

                        <button class="watch_trailer">
                            Watch Trailer
                        </button>
                    </div>
                </div>
            </div>


            <div></div>
        </div>





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
                        <a class="add_to_fav"
                            href="/project/server/add-to-favorites.php?movie_id=<?php echo $movie->id ?>">
                            <img src="<?php echo checkIfInFavorites($con, $movie->id) ? '/project/assets/icons/heart_red.svg' : '/project/assets/icons/heart_gray.svg'; ?>" alt="">
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
                        <a class="add_to_fav"
                            href="/project/server/add-to-favorites.php?movie_id=<?php echo $movie->id ?>">
                            <img src="<?php echo checkIfInFavorites($con, $movie->id) ? '/project/assets/icons/heart_red.svg' : '/project/assets/icons/heart_gray.svg'; ?>" alt="">
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
                        <a class="add_to_fav"
                            href="/project/server/add-to-favorites.php?movie_id=<?php echo $movie->id ?>">
                            <img src="<?php echo checkIfInFavorites($con, $movie->id) ? '/project/assets/icons/heart_red.svg' : '/project/assets/icons/heart_gray.svg'; ?>" alt="">
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