<?php
function getMovieReviews($con, $movieID)
{
    $procedureCall = "SELECT * FROM Reviews WHERE movie_id = $movieID;";
    $result = mysqli_query($con, $procedureCall);
    if ($result) {
        return $result;
    } else
        return null;
}
?>