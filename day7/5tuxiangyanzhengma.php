<?php
//实例：图像验证码
/*
 * 1，产生4位字符串
 * 2，创建一个空的画布
 * 3，分配颜色：背景色，文字颜色
 * 4，网图像上写入TTF字体串，imagettftext()
 * 5,输出图像，并销毁图像
 */

//1，产生随机4位的字符串
$arr1 = array_merge(range('A','Z'),range(0,9),range('a','z'));
shuffle($arr1);//打乱数组
shuffle($arr1);//打乱数组

$arr2 = array_rand($arr1,4);//从数组中随机取4位下标
//循环$arr2,取出指定下标对应的元素的值
$str = "";
foreach ($arr2 as $index)
{
    $str .=$arr1[$index];
}
//echo $str;

//2，创建一个空的画布
$width = 240;
$height = 80;
$img = imagecreatetruecolor($width,$height);

//3，绘制带填充的矩形
$color1 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,200),mt_rand(100,255));
imagefilledrectangle($img,0,0,$width,$height,$color1);

//4,写入一行TTF的字符串：将验证码字符串，写入到图像上
$fontfile="D:/app/PhpStorm/PhpStormProject/day7/msyh.ttc";
$color3 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,200),mt_rand(100,255));
imagettftext($img,28,0,16,32,$color3,$fontfile,$str);


//5,绘制像素点
for ($i=1;$i<=200;$i++)
{
    $color2 = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,200),mt_rand(100,255));
    imagesetpixel($img,mt_rand(0,$width),mt_rand(0,$height),$color2);
}

//6，输出图像到浏览器
header("content_type:image/png");
imagepng($img);

//7,销毁数据
imagedestroy($img);


//总结：最后的结果出现的是乱码，可能是编码的问题