<?php
//制作水印效果
//1,从一直图像上创建画布
$filename = "./images/cutcamera.jpeg";
$img = imagecreatefromjpeg($filename);

//2，往图像上写入一行TTF字符串
$color = imagecolorallocatealpha($img,0xFF,0X0,0X00,50);//分配半透明颜色
$fontfile = "D:/app/PhpStorm/PhpStormProject/day7/msyh.ttc";
$str ="水印";
imagettftext($img,100,0,50,200,$color,$fontfile,$str);

//3,输出图像，并销毁图像
header("content-type:image/png");
imagepng($img);
imagedestroy($img);

