<?php
//数据库配置信息
$dsn = "mysql:host=localhost;port=3306;dbname=php_test;charset=utf8";
$username = "root";
$password = "135262";

//创建PDO类的对象
$pdo = new PDO($dsn,$username,$password);

//执行查询的sql语句，执行成功后返回结果集对象(PDOStatement类)
$sql = "select *from student";
$PDOStatement = $pdo->query($sql);

//从结果集中获取一行数据
//$arr = $PDOStatement->fetch(PDO::FETCH_ASSOC);

//从结果集中循环取出所有数据
while($arr = $PDOStatement->fetch(PDO::FETCH_ASSOC))
{
    print_r($arr);
}

//从结果集中取出多行数据
$arrs = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
print_r($arrs);