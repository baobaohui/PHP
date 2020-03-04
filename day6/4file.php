<?php
//1，以写入方式打开不存在的文件
$filename = "./test.sql";
//$handle = fopen($filename,'rb');//打开文件，返回文件句柄
$handle = fopen($filename,'wb');//打开文件，返回文件句柄资源
//var_dump($handle); //打印变量

//2，关闭文件
fclose($handle);
var_dump($handle);//再次打印变量，resource(3) fo type unknown;未知资源类型

//3,读取文件，读取一行图片二进制数据
$filename = "C:\Users\Administrator\Desktop\相关头像\cutcamera.png";
$handle = fopen($filename,'rb');//以只读方式打开
# $str = fread($handle,1024);//读取全部数据
$str = fread($handle,filesize($filename));//filesize函数获取文件大小，以字节为单位

//告诉浏览器，以图片数据显示
header("Content-Type:text/html;image/png");
#header("Content-Type:text/html;charset=utf-8");

echo $str;
fclose($handle);//关闭文件

//4,读取一行数据，读取记事本的学生信息数据
echo "4,读取一行数据，读取记事本的学生信息数据<br>";
$filename = "./test.txt";
$handle = fopen($filename,'rb');
//循环读取数据，碰到换行符，文件结束符都会终止读取
while($str = fgets($handle))
{
    echo iconv('gbk','utf-8',$str)."<br>";
}

//5，整个文件读入一个字符串中：读取远程网页数据
$filename = "http://news.sina.com.cn";
$arr = file($filename,2|4);//不同打开文件和关闭文件
//$flags:附加选项
//        FILE_USE_INCLUDE_PATH(1):在include_path中查找文件
//        FILE_IGNORE_NEW_LINE(2):在数组的每个元素末尾不添加换行符
//        FILE_SKIP_EMPTY_LINES(4):跳过空行


//6，整个文件读入到一个数组中--读取远程网页数据
$filename = "http://news.sina.com.cn";
$str = file_get_contents($filename);
print_r($str);

//7,写入文件内容
$filename ="./test.txt";
$handle = fopen($filename,'ab');//以追加方式打开文件
$str = "10004,王五,男,24,高中,20000,3000,陕西省\r\n";//写入一行数据
fwrite($handle,$str);
fclose($handle);

//8,复制文件
$old = "./images/img01.jpg";
$new = "./images/img02.jpg";
copy($old,$new);

//9，删除文件
$new = "./images/img01.jpg";
unlink($new);

