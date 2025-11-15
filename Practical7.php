<?php
include('./connection1.php');
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['gender']) && isset($_POST['roll_no']) && isset($_POST['phoneno']) && isset($_POST['course'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $roll_no = $_POST['roll_no'];
    $phone_no = $_POST['phoneno'];
    $course = $_POST['course'];

    $sql = "INSERT INTO  `students`  (`firstname`,`lastname`,`gender`,`roll_no`,`phone_no`,`course`) VALUES (?,?,?,?,?,?)"; 

    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname,$gender,$roll_no,$phone_no,$course);

        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0 ) {
            echo json_encode(["message" => "Submitted successsfully."]);
        } else {
            http_response_code(400); 
            echo json_encode(["error" => "Missing Details"]);
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        http_response_code(500); 
        echo json_encode(["error" => "Server Error: " . $e->getMessage()]);
    }

    
    mysqli_close($connection);
}
?>
