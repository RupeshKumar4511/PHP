<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $Number = 123;
    $rev = 0;
    while(round($Number)>0){
        $rem = $Number%10;
        $rev = $rem + $rev*10;
        $Number = round($Number/10); 
    }
    echo $rev;  
    ?>
</body>
</html>