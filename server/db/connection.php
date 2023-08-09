<?php
$host = 'localhost';
$username = 'root';
$password = 'Antony@123';

$con = mysqli_connect($host, $username, $password);

if (!$con) {
    echo "Error" . mysqli_error($con);
} else {
    $sqlFilePath = __DIR__ . '/seed.sql';
    try {
        $sql = file_get_contents($sqlFilePath);

        if (mysqli_multi_query($con, $sql)) {
            while ($con->more_results()) {
                $con->next_result();
                $con->use_result();
            }
        } else {
            echo "Error executing SQL script: " . mysqli_error($con);
            header("Location: /project/pages/error.html");
        }
    } catch (Exception $e) {
        echo "Error reading SQL script: " . $e->getMessage();
        header("Location: /project/pages/error.html");
    }
}
?>