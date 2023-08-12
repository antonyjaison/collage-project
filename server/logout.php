<?php
session_start();
session_destroy();
header("Location: /project/pages/login.php");
exit();
?>