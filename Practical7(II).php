<?php
include('./connection1.php');
if (isset($_GET['roll_no'])) {
    $roll_no = $_GET['roll_no'];


    
    $sql = "SELECT * FROM `students` WHERE `roll_no` = ?";
    
    // Prepare and bind parameters
    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $roll_no);

        mysqli_stmt_execute($stmt);

        
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0 ) {
            echo json_encode(["data" => $result->fetch_assoc()]);
        } else {
            http_response_code(400); 
            echo json_encode(["error" => "Incorrect roll_no."]);
            exit();
        }

        
        mysqli_stmt_close($stmt);
    } else {
        http_response_code(500); 
        echo json_encode(["error" => "Server Error: " . $e->getMessage()]);
    }

    // Close the connection
    mysqli_close($connection);
}
?>
