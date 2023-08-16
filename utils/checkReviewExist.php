<?php
function getReviewIfExists($con, $movieId, $userId)
{
    $checkQuery = "SELECT * FROM Reviews WHERE user_id = '$userId' AND movie_id = '$movieId'";

    $checkResult = mysqli_query($con, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        $reviewData = mysqli_fetch_assoc($checkResult);
        return $reviewData;
    } else {
        return null;
    }
}
?>