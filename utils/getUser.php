<?php
function getUser($con, $userID)
{
    $query = "SELECT name FROM Users WHERE user_id = '$userID';";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['name'];
    } else {
        return "Anonymous ";
    }
}
?>