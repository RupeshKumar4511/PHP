<?php
include('./connection1.php');
if (isset($_GET['roll_no'])) {
    $roll_no = $_GET['roll_no'];


    // SQL query to select the record
    $sql = "SELECT * FROM `students` WHERE `roll_no` = ?";
    
    // Prepare and bind parameters
    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $roll_no);
        // Here ss means both string

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Get the result and check if there’s a match
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0 ) {
            echo json_encode(["data" => $result]);
        } else {
            http_response_code(400); // Set HTTP status to 400 for client error
            echo json_encode(["error" => "Incorrect roll_no."]);
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        http_response_code(500); // Server error
        echo json_encode(["error" => "Server Error: " . $e->getMessage()]);
    }

    // Close the connection
    mysqli_close($connection);
}
?>
