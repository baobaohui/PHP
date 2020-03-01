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
//取出如下若干个文件中的图片文件
//假定图片后缀为 jpg,png,gif
$files = array("abc.gif","123.txt","dirl/gift.PNG"."FILE.jpg");

$len = count($files);
for($i=0;$i<$len;$i++)
{
    $houzhui = strrchr($files[$i],'.'); //.gif .png
    $houzhui = substr($houzhui,1);  //gif png
    $houzhui = strtolower($houzhui);
    if($houzhui=="png" || $houzhui=="jpg" || $houzhui=="gif")
    {
        echo "<br>".$files[$i];
    }
}

?>
</body>
</html>
