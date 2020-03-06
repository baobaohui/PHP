<?php
//创建一个空画布
$img = imagecreatetruecolor(300,100);

//分配颜色
$color1 = imagecolorallocate($img,0,0,0);
$color2 = imagecolorallocate($img,255,0,0);

//填充背景色
imagefill($img,0,0,$color1);

//获取画布的宽度和高度
$imgwidth = imagesx($img);
$imgheight = imagesy($img);

//获取一个指定字体的宽度和高度
$font = 5;
$fontwidth = imagefontwidth($font);
$fontheight = imagefontheight($font);

//计算字符串的起点坐标
$str = "welcome to php";
$x = ($imgwidth-$fontwidth*strlen($str))/2;
$y = ($imgheight-$fontheight)/2;

//网图像上写入一行字符串(非中文)
imagestring($img,$font,$x,$y,$str,$color2);
header("Content-Type:image/png");
imagepng($img);
imagedestroy($img);