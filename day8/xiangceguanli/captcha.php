<?php
/*
 * 图像验证码
 * 1，产生随机验证码字符串
 * 2，创建空画布
 * 3，绘制带填充的矩形
 * 4，绘制像素点
 * 5，绘制线段
 * 6，写入一行TTF字符串
 * 7，输出图像，并销毁图像
 *
 * */

//1，产生4位随机验证码字符串
//合并字母和数字为数组
$arr1 = array_merge(range('a','z'),range(0,9),range('A','Z'));
shuffle($arr1);//打乱
$arr2 = array_rand($arr1,4);//随机取出四个小标
$str = "";
foreach ($arr2 as $index)
{
    $str .=$arr1[$index];
}

//将验证码保存在session中
session_start();
$_SESSION['captcha']=strtolower($str);//部分大小写的话可以进行小写转化
//print_r($str);

//2，创建空画布
$width = 70;//70
$height = 22;//22
$img = imagecreatetruecolor(70,22);

//3，绘制带填充的矩形
//为一幅图像分配颜色
$color1 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
//画一矩形并填充
imagefilledrectangle($img,0,0,$width,$height,$color1);


//4，绘制像素点
for ($i=1;$i<=100;$i++)
{
    $color2 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),$color2);
}


//5，绘制线段
for ($i=1;$i<=10;$i++)
{
    $color3 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$color3);
}
//die();

//6，写入一行TTF字符串
$fontfile="D:/app/PhpStorm/PhpStormProject/day7/msyh.ttc";
$color4 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
imagettftext($img,18,0,5,20,$color4,$fontfile,$str);
//die();

//7，输出图像，并销毁图像
header("content-type:image/png");
imagepng($img);
imagedestroy($img);
die();