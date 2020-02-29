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

#求的一个数字的阶乘

function jiecheng($n)
{
    if($n == 1)
        return 1;
    $result = $n * jiecheng($n-1);
    return $result;
}
#可以先判断是否存在，然后进行类型判断
if(@$_POST['num'])
{
    $n = $_POST['num'];
    $result = jiecheng($n);
    echo "{$n}的阶乘为：".$result;
}
else
{
    echo "输入无效，请重新输入！";
}




?>
<form action="" method="post">
    请输入需要求得的阶乘的大小
    <input type="text" name="num">
    <input type="submit" value="确定">
</form>
</body>
</html>