<?php
//创建一个新的目录
$dirname = "./static";

//第一个参数：目录名称
//第二个参数：目录访问权限，0777最大权限
//第三个参数：如果上层目录不存在，则会递归创建
mkdir($dirname,0777,true);

//2，判断当前文件是文件还是目录
if(is_dir($dirname))
{
    echo "{$dirname}是目录！";
}
else
{
    echo "{$dirname}是文件！";
}

//3，判断文件是否存在
if(file_exists($dirname))
{
    echo "{$dirname}文件存在！<br>";

    //如果文件存在，判断它是文件还是目录
    if(is_dir($dirname))
    {
        echo "{$dirname}是目录！";
    }
    else
    {
        echo "{$dirname}不是目录！";
    }
}
else
{
    echo "{$dirname}文件不存在！<br>";
}

//4，判断文件是否存在
if(file_exists($dirname))
{
    //判断是不是目录
    if(is_dir($dirname))
    {
        //删除目录：该目录必须是空的，否则会报错
        rmdir($dirname);
    }
}

//5，更改文件或目录的权限，权限值不能加引号
chmod($dirname,0444);

//6，获取文件的权限值，返回十进制
$int = fileperms($dirname);
$int = decoct($int);    //十进制转成八进制
echo substr($int,-4);//截取字符串：40777转成0777

//7，更改目录或文件名称，确定原目录必须存在
//注意：如果原目录和新目录都位于同一个父目录下，则认为是改名，
//     若不在同一目录下，则认为是移动
$oldname = "./public";
$newname = "./itcast/public";
rename($oldname,$newname);

//8，打开目录
$dirname = "./itcast";
$handle = opendir($dirname);//打开目录，成功返回目录句柄(资源型),失败返回false
var_dump($handle);
//resource(3) of type (stream)
//resource:资源型数据，是到第三方数据的通道
//stream文件流，是windows资源管理器
//数字3是一个资源编号，不同资源编号不同

//9，读取目录中条目
$dirname = "./itcast";
$handle = opendir($dirname);//打开目录，返回目录句柄资源
//从目录句柄资源中取回所有条目，文件或目录
//循环结束标志，当资源中所有条目全部被读取完毕，返回false
while($line = readdir($handle))
{
    echo $line."<br>";
}

//10，读取目录中的条目
$dirname ="./itcast";
$handle = opendir($dirname);//打开目录返回句柄资源
while($line=readdir($handle))
{
    echo iconv('utf-8','utf-8',$line)."<br>";
}

//11，关闭目录句柄：节省服务器资源
closedir($handle);