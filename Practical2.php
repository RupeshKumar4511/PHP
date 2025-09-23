<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="get">
        <label for="first_Number">First_Number</label>
        <input type="text" name="first_number">
        <br>
        <label for="second_number">Second_Number</label>
        <input type="text" name="second_number">
        <br>
        <input type="submit" value="submit">
    </form>

    <?php
    
    if(isset($_GET['first_number']) && isset($_GET['second_number'])){
        $sum = $_GET['first_number'] + $_GET['second_number'];
        echo "<h2>Result: $sum</h2>";
    }
    ?>

</body>
</html>