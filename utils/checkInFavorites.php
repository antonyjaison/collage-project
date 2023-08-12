<?php
function checkIfInFavorites($con, $movie_id)
{
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        $checkQuery = "SELECT COUNT(*) as num FROM Favorites WHERE user_id = '$user_id' AND movie_id = '$movie_id';";

        $countResult = mysqli_query($con, $checkQuery);
        
        if ($countResult) {
            $countData = mysqli_fetch_assoc($countResult);
            $count = $countData['num'];
            
            return $count > 0; // Return true if count > 0, otherwise false
        } else {
            // Handle error here
            return false;
        }
    } else {
        return false;
    }
}
?>
