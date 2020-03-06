<?php
//实例：制作图像缩略图，缩放到原图的一半，图像不会变形

//1,创建画布，目标画布，原画布
$filename = "./images/cutcamera.jpeg";
$src_img  = imagecreatefromjpeg($filename);//原画布
$src_w  = imagesx($src_img);//原画布宽度
$src_h  = imagesy($src_img);//原画布高度
$dst_w  = $src_w*0.5;//目标画布宽度
$dst_h  = $src_h*0.5;//目标画布高度
$dst_img = imagecreatetruecolor($dst_w,$dst_h);

//2，生成缩略图
imagecopyresampled($dst_img,$src_img,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);

//3，保存图像，并销毁图像
imagejpeg($dst_img,"./images/img2.jpg");
imagedestroy($dst_img);
imagedestroy($src_img);

