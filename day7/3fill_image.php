<?php
//创建一个画布，填充颜色
$img = imagecreatetruecolor(400,300);
$color1 = imagecolorallocate($img,0xFF,0X00,0X00);
$color2 = imagecolorallocate($img,255,0,0);

//给画布填充颜色
imagefill($img,0,0,$color2);

//输出图像到浏览器
header("Content-Type:image/png");
imagepng($img);
imagedestroy($img);


//创建一个画布，网图像上写一行字符串
$img = imagecreatetruecolor(300,100);
$color1 = imagecolorallocate($img,0,0,0);
$color2 = imagecolorallocate($img,255,0,0);

imagefill($img,0,0,$color1);//填充背景颜色
$str = "welcome to php";
imagestring($img,5,40,20,$str,$color2);
imagestring($img,5,60,50,$str,$color2);
imagestring($img,5,80,280,$str,$color2);

header("Content-Type:image/png");//输出图像到浏览器
imagepng($img);
imagedestroy($img);