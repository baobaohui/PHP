<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>My first PHP page</h1>

<?php
    echo "Hello World!";
    echo "<br>";
    echo date("当前时间：Y-m-d h:i:s");
    //echo data("星期 w");
    echo "<br>";

    //$mysqli = new mysqli("localhost","root","135262","hhelp");
    $my = mysqli_connect("localhost","root","135262","hhelp");

    if ( $my )
        {
            echo 'connect success!';
        }
    else
        {
            echo 'connect fail!';
        }

//    $con=mysqli_connect("localhost", "root", "135262","hhelp")
//    OR die('Could not connect to database.');
//    echo "Connected!";
    echo "<br>";

    $v1 = 1;
    $v2 = 2;
    $v3 = $v1+$v2;
    echo $v3;

    echo "<br>";


    echo "php的执行环境：";
    phpinfo();

?>
</body>
</html>