<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $portno = "3307";
    $connection = mysqli_connect($server, $username, $password, "test", $portno);

    if (!$connection) {
        echo "Connection failed: " . mysqli_connect_error();
    } else {
        // echo "Successfully connected to the database.";
    }


?>