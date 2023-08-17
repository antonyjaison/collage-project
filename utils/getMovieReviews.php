<?php
function getMovieReviews($con, $movieID)
{
    $procedureCall = "SELECT * FROM Reviews WHERE movie_id = $movieID ORDER BY created_at DESC";
    $result = mysqli_query($con, $procedureCall);
    if ($result) {
        return $result;
    } else
        return null;
}
?>

