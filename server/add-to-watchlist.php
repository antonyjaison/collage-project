<?php
include("db/connection.php");
session_start();

if (!isset($_SESSION['user_id']) && !isset($_GET['movie_id'])) {
    echo "Error";
} else {
    $user_id = $_SESSION['user_id'];
    $movie_id = $_GET['movie_id'];

    $checkQuery = "SELECT * FROM Watchlist WHERE user_id = '$user_id' AND movie_id = '$movie_id'";
    $insertQuery = "INSERT INTO Watchlist VALUES('$user_id','$movie_id');";
    $deleteQuery = "DELETE FROM Watchlist WHERE user_id = '$user_id' AND movie_id = '$movie_id'";

    $result = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $result = mysqli_query($con, $deleteQuery);
        header("Location: /project/homepage.php");
    } else {
        $result = mysqli_query($con, $insertQuery);

        if ($result) {
            header("Location: /project/homepage.php");
        } else {
            header("Location: /project/pages/error.php");
        }
    }
}
?>