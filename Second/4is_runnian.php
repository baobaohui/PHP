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

<?php
    if( !empty($_POST['year']))
    {
        $year = $_POST['year'];
        // $year = (int)$_POST['year'];
        if(is_int($year))
        {
            if($year%4==0 && $year%100!=0 || $year%400==0)
                echo $year . "是闰年";
            else
                echo "{$year}不是闰年";
        }
        else
            echo "输入无效，请重新输入";
    }

    $year2 = 2003;
    $is_runnian =($year2%4==0 && $year%100!=0 || $year%400==0)?"是闰年":"不是闰年";
    echo $year2,$is_runnian;
?>
<p>输入一个整数表示年份，判断该年份时候是闰年</p>
<form action="" method="post">
    请输入年份:
    <input type="text" name="year">
    <input type="submit" value="判断">

</form>
</body>
</html>
