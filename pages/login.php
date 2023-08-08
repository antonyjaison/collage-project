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
            <form action="/project/server/php-login.php" method="post">
                <input required name="username" type="text" placeholder="Email">
                <input required name="password" type="password" placeholder="password">
                <p class="signup_link">New user? <a href="signup.php">Register</a></p>
                <a href="#">
                    <button class="submit_btn" type="submit" name="submit">Login</button>
                </a>
            </form>
        </div>
    </main>

</body>

</html>