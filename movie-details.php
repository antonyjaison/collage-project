<?php
require_once "utils/fetchAPI.php";
require_once "constants.php";

if (isset($_GET['id'])) {
    $movieId = $_GET['id'];
    $apiUrl = "$BASE_URL/movie/$movieId?api_key=$API_KEY&language=en-US";
    $data = fetchDataFromAPI($apiUrl);

    if ($data->backdrop_path != null) {
        $posterURL = $imgURL . $data->backdrop_path;
    } else {
        $posterURL = $imgURL . $data->belongs_to_collection->backdrop_path;
    }
} else {
    echo "Movie ID not available.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?php echo $data->title; ?></title>
    <link rel="stylesheet" href="./styles/homepage.css">
    <link rel="stylesheet" href="./styles/movie-details.css">
</head>

<body>

    <section
        style="background:url('<?php echo $posterURL; ?>'); background-position: center; background-repeat: no-repeat; background-size: cover;"
        class="hero_wrapper">
        <div class="dim_wrapper">
            <nav class="container nav_wrapper">
                <div class="logo">
                    <img src="/project/assets/images/logo.svg" alt="">
                    <h2>MovieBox</h2>
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-5 movie_details">
                        <h1><?php echo $data->title; ?></h1>
                        <div class="imdb_rating">
                            <img src="/project/assets/images/imdb.svg" alt="imdb">
                            <p><?php echo $data->vote_average; ?>/10</p>
                        </div>
                        <p><?php echo $data->overview; ?></p>
                        <p class="genre_section">
                            <?php
                                $genres = array();
                                foreach ($data->genres as $genre) {
                                    $genres[] = $genre->name;
                                }
                                echo "Genre: " . implode(" | ", $genres);
                            ?>
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

    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
