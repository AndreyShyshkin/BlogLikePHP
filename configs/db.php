<?php
    $servername = "localhost";
    $database = "new_blog";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

?>