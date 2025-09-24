<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $string = "hello world ";
    echo "String Length : ". strlen($string);
    echo "<br>";
    echo "Substring : ". substr($string,0,5);
    echo "<br>";
    $replaced_string = str_replace("world","php",$string);
    echo "Replace world with php: ". $replaced_string;
    echo "<br>";
    echo "Removed whitspace and other predefined characters : ".trim($replaced_string);
    echo "<br>";
    echo var_dump(is_string($replaced_string));
    echo "<br>";
    echo "Captalize first letter of each word in a string : ";
    echo "<br>";
    $string_word = explode(" ",$replaced_string);
    foreach($string_word as $i){
        echo strtoupper(substr($i,0,1)).substr($i,1)." ";
    }
    ?>
</body>
</html>