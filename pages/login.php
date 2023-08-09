<?php
include("../server/db/connection.php");
session_start();

if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user_details WHERE email = '$email' AND password='$password'";

    $result = mysqli_query($con, $query);

    $count = mysqli_num_rows($result);

    
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['name'] = $row['name'];
        }
        header("Location: /project/homepage.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Login</title>
</head>

<body>

    <main class="login_wrapper">
        <div class="login_section">
            <h2>Login</h2>
            <form action="/project/pages/login.php" method="post">
                <input required name="email" type="email" placeholder="Email">
                <input required name="password" type="password" placeholder="password">
                <p class="signup_link">New user? <a href="signup.php">Register</a></p>
                <?php 
                    if (isset($count) && $count == 0) {
                        echo "<p class='error_message'>Invalid Credentials.</p>";
                    }
                ?>
                <a href="#">
                    <button class="submit_btn" type="submit" name="submit">Login</button>
                </a>
            </form>
        </div>
    </main>

</body>

</html>