<?php
session_start();

if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;

    header("Location: /project/homepage.php");
    exit();

}
?>