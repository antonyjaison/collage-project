<?php
include("../server/db/connection.php");
session_start();

if (isset($_POST["submit"])) {

    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $query = "SELECT * FROM Users WHERE email = '$email'";

    $result = mysqli_query($con, $query);

    $count = mysqli_num_rows($result);

    if ($count == 0) {
        $insertQuery = "INSERT INTO Users VALUES(0,'$name','$email','$password');";
        $result = mysqli_query($con, $insertQuery);
    }



}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Signup</title>
</head>

<body>

    <main class="login_wrapper">
        <div class="login_section">
            <h2>Signup</h2>
            <form action="/project/pages/signup.php" method="post">
                <input required type="text" name="name" placeholder="Name">
                <input required type="text" name="email" placeholder="Email">
                <input required type="password" name="password" placeholder="password">
                <p class="signup_link">Existing user? <a href="login.php">Login now</a></p>
                <?php
                if (isset($count) && $count > 0) {
                    echo "<p class='error_message'>User already exists.</p>";
                }
                ?>
                <a href="#">
                    <button class="submit_btn" name="submit" type="submit">Sign In</button>
                </a>
            </form>
        </div>
    </main>

</body>

</html>