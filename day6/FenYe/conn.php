<?php
$db_host = "localhost";
$db_port = "3306";
$db_user = "root";
$db_pass = "135262";
$db_name = "php_test";
$charset = "utf-8"; //字符集


//1,连接数据库
//$mysqli = new mysqli("localhost","root","135262","hhelp");
$link = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
//if ( $link )
//{
//    echo 'connect success!';
//}
//else
//{
//    echo 'connect fail!';
//    echo "<br>系统错误信息：".mysqli_connect_error();  //2,打印错误信息
//}

//3,选择指定数据库
if(!mysqli_select_db($link,$db_name))
{
    echo "<br> 选择数据库{$db_name}失败";
    die();
}
else
{
    # echo "<br>连接数据库成功<br>";
}

//4,设置数据库返回数据字符集
mysqli_set_charset($link,$charset);
