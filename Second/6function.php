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
<p>判断2000 - 2001 年中是闰年的年份，并输出</p>
<?php

    function runnian()
    {
        for($year=2000;$year<=2100;$year++)
        if(is_int($year))
        {
            if($year%4==0 && $year%100!=0 || $year%400==0)
                echo $year . "是闰年"."<br>";
            else
                echo "{$year}不是闰年"."<br>";
        }
        else
            echo "输入无效，请重新输入";
    }

    runnian();


    #可变函数
    function do_jpg($f)
    {
        echo "<br>处理jpg图片。。。";
    }
    function do_gif($f)
    {
        echo "<br>处理gif图片。。。";
    }
    function do_png($f)
    {
        echo "<br>处理png图片。。。";
    }
    $file = $_GET['filename'];//用户上传的文件名，比如123.jpg
    //haystack：干草堆，neele:缝衣针
    //strrchr() 用于在一个字符串haystack中找出指定的某个字符串needle出现的最后位置往后的所有字符
    //$houzhui = strrchr(haystack,needle)
    $houzhui = strrchr($file,'.');//得到类似这样：“.gif"

    //substr($v1,位置p，[长度n]);取出字符串v1中从位置p开始之后的n个字符
    $houzhui = substr($houzhui,i);//得到类似 jpg
    $func_name = "do_".$houzhui;    //构建出可以使用的函数名
    $func_name($file);
?>

</body>
</html>
