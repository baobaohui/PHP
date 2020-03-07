<?php
//定义变量
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '135262';
$db_name = 'php_albummanagement';
$charset = 'utf8';


//连接
if (!$link = @mysqli_connect($db_host,$db_user,$db_pass))
{
    echo "<h2>php连接数据库失败</h2>";
    die();
}

//选择数据库
if (!mysqli_select_db($link,$db_name))
{
    echo "<h2>选择数据库失败</h2>";
    die();
}

//设置字符集
mysqli_set_charset($link,$charset);