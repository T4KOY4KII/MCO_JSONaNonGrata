<?php

$host = "localhost:3308"; // feel free to change the port number depending on xampp for editing
$username = "root";
$password = "";
$dbName = "users_db";

$conn = mysqli_connect($host, $username, $password, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>