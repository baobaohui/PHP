<?php
//phpinfo();

//数据库配置信息
$dsn = "mysql:host=localhost;port=3306;dbname=php_test;charset=utf8";
$username = "root";
$password = "135262";

//创建PDO类的对象
$pdo = new PDO($dsn,$username,$password);
//var_dump($pdo);

//设置PDO属性：设置从结果集提取数组的类型为关联数组
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);


//执行插入的sql语句
//$sql = "insert into student values(null,'刘师傅',1,default ,'大专',6000,500,'山东省')";
//$records = $pdo->exec($sql);
//echo "成功插入了{$records}条记录";

//执行查询的sql语句
$sql = "select *from student";
$PDOStatement = $pdo->query($sql);
//var_dump($PDOStatement);

//遍历结果集对象，取出每一行数据(一维数组)
foreach($PDOStatement as $arr)
{
    print_r($arr);
}

