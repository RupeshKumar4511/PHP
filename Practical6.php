<?php
include('./connection.php');
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['userpassword'];

    $sql = "SELECT * FROM `credentials` WHERE `User_Name` = ? AND `Password` = ?";
    
    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0 ) {
            echo json_encode(["message" => "Hello, $username!"]);
        } else {
            http_response_code(400); 
            echo json_encode(["error" => "Incorrect username or password."]);
            exit();
        }

        mysqli_stmt_close($stmt);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Message could not be processed: " . $e->getMessage()]);
    }

    mysqli_close($connection);
}
?>
