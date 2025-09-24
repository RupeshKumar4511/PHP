<?php
include('./connection.php');
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['userpassword'];

    // SQL query to select the record
    $sql = "SELECT * FROM `credentials` WHERE `User_Name` = ? AND `Password` = ?";
    
    // Prepare and bind parameters
    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        // Here ss means both string

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Get the result and check if there’s a match
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0 ) {
            echo json_encode(["message" => "Hello, $username!"]);
        } else {
            http_response_code(400); // Set HTTP status to 400 for client error
            echo json_encode(["error" => "Incorrect username or password."]);
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        http_response_code(500); // Server error
        echo json_encode(["error" => "Message could not be processed: " . $e->getMessage()]);
    }

    // Close the connection
    mysqli_close($connection);
}
?>
