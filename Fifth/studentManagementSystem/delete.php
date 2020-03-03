<?php
//包含连接数据库的公共代码
require_once("./conn.php");

//获取地址栏传递的id
$id = $_GET['id'];

//构建删除语句
$sql = "delete from student where id=$id";

//执行sql语句
if(mysqli_query($link,$sql))
{
    echo "<h2>记录删除成功!</h2>";

    //等待2s后，跳转到list.php文件
    header("refresh:2;url=./list.php");
    die();//终止程序向下运行
}
else
{
    echo "<h2>记录删除失败</h2>";
    header("refresh:2;url=./list.php");
    die();
}