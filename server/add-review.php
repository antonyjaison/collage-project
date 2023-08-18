<?php
include("db/connection.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Error: Not logged in.";
} elseif (isset($_POST['submit'])) {
    // Adding a new review
    $user_id = $_SESSION['user_id'];
    $review = $_POST['review-text'];
    $rating = $_POST['rating'];
    $movieId = $_POST['movieId'];


    $insertQuery = "INSERT INTO Reviews VALUES ('$user_id', '$movieId', '$rating', '$review', CURRENT_TIMESTAMP)";


    $insertResult = mysqli_query($con, $insertQuery);

    if ($insertResult) {
        header("Location: /project/pages/movie-details.php?id=$movieId");
    } else {
        header("Location: /project/pages/error.php");
    }
} elseif (isset($_POST['delete-review'])) {
    // Deleting a review
    $user_id = $_SESSION['user_id'];
    $movieId = $_POST['movieId'];

    $deleteReviewQuery = "DELETE FROM Reviews WHERE user_id = '$user_id' AND movie_id = '$movieId'";
    $deleteResult = mysqli_query($con, $deleteReviewQuery);

    if ($deleteResult) {
        header("Location: /project/pages/movie-details.php?id=$movieId");
    } else {
        header("Location: /project/pages/error.php");
    }
} elseif (isset($_POST['update-review'])) {
    // Updating a review
    $user_id = $_SESSION['user_id'];
    $review = $_POST['review-text'];
    $rating = $_POST['rating'];
    $movieId = $_POST['movieId'];

    $updateReviewQuery = "UPDATE Reviews SET review_text = '$review', rating = '$rating' WHERE user_id = '$user_id' AND movie_id = '$movieId'";

    $updateResult = mysqli_query($con, $updateReviewQuery);

    if ($updateResult) {
        header("Location: /project/pages/movie-details.php?id=$movieId");
    } else {
        header("Location: /project/pages/error.php");
    }
} else {
    echo "Invalid request.";
}
?>