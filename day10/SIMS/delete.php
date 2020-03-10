<?php
//包含连接数据库的公共文件
require_once ("./conn.php");

//var_dump($db);
//获取地址栏传递的参数
$id = $_GET['id'];

//构建删除的sql语句
$sql = "delete from student where id ={$id}";
//echo $sql;

//判断记录是否删除成功
if($db->exec($sql))
{
    echo "id={$id}的记录删除成功";
    header("refresh:3;url=./list.php");
    die();
}
else
{
    echo "id={$id}的记录删失败";
    header("refresh:3;url=./list.php");
    die();
}