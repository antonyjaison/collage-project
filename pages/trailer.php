<?php
include_once '../constants.php';
include_once '../utils/fetchAPI.php';
include_once '../utils/getMovieReviews.php';
include("../server/db/connection.php");

session_start();

if (!isset($_GET['movie_id']) && !isset($_SESSION['name'])) {
    echo "No movie id";
} else {
    $movieID = $_GET['movie_id'];
    $name = $_SESSION['name'];
}

$videoApi = "https://api.themoviedb.org/3/movie/$movieID/videos?language=en-US&api_key=$API_KEY";

$video = fetchDataFromAPI($videoApi)->results[0];


$reviews = getMovieReviews($con, $movieID);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/project/styles/trailer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container pt-4 pb-4">

        <div class="row">
            <div class="col-lg-6">
                <div class="logo">
                    <img src="/project/assets/images/logo.svg" alt="">
                    <h2 class="display-6">MovieBox</h2>
                </div>

            </div>
            <div class="col-lg-6 d-flex justify-content-end align-items-center">
                <h2 class="display-6 name">Hi,
                    <?= $name ?>
                </h2>
            </div>
        </div>


        <div class="row pt-4">
            <div class="col-lg-8">
                <iframe src="http://www.youtube.com/embed/<?php echo $video->key ?>?autoplay=1" frameborder="0"
                    allowfullscreen></iframe>
                <h1 class="display-6 video_heading">
                    <?php echo $video->name ?>
                </h1>

            </div>
            <div class="col-lg-4">

                <?php if (empty($reviews)): ?>
                    <p>No reviews yet</p>

                <?php else: ?>
                    <div class="comment-section">
                        <?php
                        foreach ($reviews as $review) {
                            echo '<div class="comment">';
                            echo '<div class="comment-details">';
                            echo '<img class="user-image" src="/project/assets/icons/user.png" alt="User Image">';
                            echo '<span class="comment-username">' . 'dsdsd' . '</span>';
                            echo '<span class="comment-rating">Rating: ' . $review['rating'] . '</span>';
                            echo '</div>';
                            echo '<p class="comment-review">' . $review['review_text'] . '</p>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                <?php endif; ?>

            </div>


        </div>
    </div>

    <!-- bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>