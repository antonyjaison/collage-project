<?php
function checkInWatchlist($con, $movieID, $userID)
{
    $query = "SELECT * FROM Watchlist WHERE user_id = '$userID' AND movie_id = '$movieID';";

    $result = mysqli_query($con, $query);

    $count = mysqli_num_rows($result);

    if ($count > 0) {
        return true;
    } else
        return false;
}
?>