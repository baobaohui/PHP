<?php
$filename = "./images/cutcamera.jpeg";
$img = imagecreatefromjpeg($filename);

//输出图像到浏览器
header("Content-Type:image/jpeg");
imagejpeg($img);

//销毁图像资源
imagedestroy($img);
var_dump($img);

//从已知图片上创建画布
$img = imagecreatetruecolor(400,300);

//输出图像到浏览器：告诉浏览器要输出的内容为图像数据
header("Content-Type:image/jpeg");
imagejpeg($img);
#imagejpeg($img,null,100);//如果指向有关第三个参数，第2个参数使用null代替

#将画布保存成图像文件，不使用header()
#imagejpeg($img,"./images/img02.jpg",100);

//销毁图像资源
imagedestroy($img);


