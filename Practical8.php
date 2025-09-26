<?php
include('./connection3.php');

// CREATE DATABASE

// $sql = "CREATE DATABASE todos_db";
// $stmt = mysqli_prepare($connection, $sql);
// if (mysqli_stmt_execute($stmt)) {
//     echo "\nDatabase created successfully.";
// } else {
//     echo "Error creating database: " . mysqli_error($connection);
// }
// mysqli_stmt_close($stmt);


// USE Database
$sql2 = "USE todos_db";
if (mysqli_query($connection,$sql2)) {
    echo "\nUsing todos_db database.";
} else {
    echo "Error using database: " . mysqli_error($connection);
}



// CREATE TABLE
// $sql3 = "CREATE TABLE todos (
//     title VARCHAR(50) NOT NULL,
//     description VARCHAR(100)
// )";
// if (mysqli_query($connection, $sql3)) {  
//     echo "\nTable todos created successfully.";
// } else {
//     echo "Error creating table: " . mysqli_error($connection);
// }


// Insert Data into Table
if(isset($_GET['Add_Todo']) && $_GET['Add_Todo']=='Add_Todo'){
    if(isset($_GET['title']) && isset($_GET['description']) ){
        $title = $_GET['title'];
        $description = $_GET['description'];

    
        $sql4 = "INSERT INTO todos (title, description) VALUES (?, ?)";
        if($stmt = mysqli_prepare($connection, $sql4)){
            mysqli_stmt_bind_param($stmt, "ss", $title, $description);
            mysqli_stmt_execute($stmt);

            if(mysqli_stmt_affected_rows($stmt) > 0){
                echo json_encode(["message" => "Todo added successfully."]);
            } else {
                http_response_code(400);
                echo json_encode(["error" => "Failed to add todo."]);
                exit();
            }

            mysqli_stmt_close($stmt);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Server Error: " . mysqli_error($connection)]);
        }
    }
}


// DELETE Data from Table
if(isset($_GET['Delete_Todo']) && $_GET['Delete_Todo']=='Delete_Todo'){
    if(isset($_GET['title']) ){
        $title = $_GET['title'];

    
        $sql5 = "DELETE FROM todos WHERE title = ?";
        if($stmt = mysqli_prepare($connection, $sql5)){
            mysqli_stmt_bind_param($stmt, "s", $title);
            mysqli_stmt_execute($stmt);

            if(mysqli_stmt_affected_rows($stmt) > 0){
                echo json_encode(["message" => "Todo deleted successfully."]);
            } else {
                http_response_code(400);
                echo json_encode(["error" => "Failed to delete todo."]);
                exit();
            }

            mysqli_stmt_close($stmt);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Server Error: " . mysqli_error($connection)]);
        }
    }
}


// Display Data from Table

if(isset($_GET['Display_Todos']) && $_GET['Display_Todos']=='Display_Todos'){
    $sql6 = "SELECT * FROM todos";
    $stmt = mysqli_prepare($connection, $sql6);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) > 0){
            echo json_encode(["message" => $result->fetch_assoc()]);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Failed to display todo."]);
        exit();
        }

        mysqli_stmt_close($stmt);
        
    } 


mysqli_close($connection);
?>