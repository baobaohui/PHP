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
    <table border="1" width="700" height="200">

    <?php
        for($i=1; $i<=9; $i++)
        {
            echo "<tr>";
            for($k=1; $k<=$i; $k++)
            {
                $s = $k * $i;
                echo "<td>{$k}*{$i}= $s</td>";
                #另一种写法
                #echo "<td>{$k}*{$i}=" . $k*$i ."</td>";
            }
        }
    ?>
    </table>
</body>
</html>
