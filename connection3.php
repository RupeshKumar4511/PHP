<?php
$server = "localhost";
$username = "root";
$password = "kumarrn4511@";

$connection = mysqli_connect($server, $username, $password);
if (!$connection) {
    echo "Connection failed: " . mysqli_connect_error();
}else {
    echo "Connected successfully to MySQL server.";
}
?>