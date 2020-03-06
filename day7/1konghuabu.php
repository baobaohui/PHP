<?php
//创建一个空画布
$img = imagecreatetruecolor(400,300);
//打印变量：创建画布成功返回图像资源，否则返回false
var_dump($img);

//从已知图片上创建画布
$filename = "./images/cutcamera.jpeg";   //虽然后缀是.png 但是图片 本身还是jpeg格式
$ename=getimagesize($filename); //获取文件信息
print_r($ename);    //打印文件信息
$ename=explode('/',$ename['mime']); //截取出图片类型
echo "<br>";
print_r ($ename);
$ext=$ename[1];
switch($ext){
    case "png":

        $image=imagecreatefrompng($filename);
        echo "png";
        header("Content-Type:image/png");
        imagejpeg($image);
        break;
    case "jpeg":

        $image=imagecreatefromjpeg($filename);
        echo "jpeg";
        //输出图像到浏览器
        header("Content-Type:image/jpeg");
        imagejpeg($image);
        break;
    case "jpg":

        $image=imagecreatefromjpeg($filename);
        echo "jpg";
        header("Content-Type:image/jpg");
        imagejpeg($image);
        break;
    case "gif":

        $image=imagecreatefromgif($filename);
        echo "gif";
        header("Content-Type:image/gif");
        imagejpeg($image);
        break;
}

imagedestroy($image);