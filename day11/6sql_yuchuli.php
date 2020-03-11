<?php
//数据库配置信息
$dsn = "mysql:host=localhost;port=3306;dbname=php_test;charset=utf8";
$username = "root";
$password = "135262";

//创建PDO类的对象
$pdo = new PDO($dsn,$username,$password);

//制作相同结构的SQL语句，数据部分用占位符代替
$sql = "insert into student(name,salary,bonus,city) values(:name,:salary,:bonus,:city)";
$sql = "insert into student(name,salary,bonus,city) values(?,?,?,?)";

//预编译相同结构的SQL语句(含有占位符)
$PDOStatement = $pdo->prepare($sql);

//给命名参数(:value)占位符绑定数据：每个命名参数必须要加引号
$PDOStatement->bindValue(':name','陈晖');
$PDOStatement->bindValue(':salary',8000);
$PDOStatement->bindValue(':bonus',900);
$PDOStatement->bindValue(':city','山东省');

//给问号(?)占位符绑定数据：1对应第1个问号，2对应第2个问号，一次类推
$PDOStatement->bindValue(1,'陈2晖');
$PDOStatement->bindValue(2,8000);
$PDOStatement->bindValue(3,900);
$PDOStatement->bindValue(4,'山东省');

//执行绑定数据预处理SQL语句
$PDOStatement->execute();