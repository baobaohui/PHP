<?php
//数据库配置信息
$dsn = "mysql:host=localhost;port=3306;dbname=php_test;charset=utf8";
$username = "root";
$password = "135262";

//创建PDO类的对象
$pdo = new PDO($dsn,$username,$password);


//设置错误报告模式：警告模式
//$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

//设置错误报告模式：异常模式
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

try {
    //执行查询的sql语句，执行成功后返回结果集对象(PDOStatement类)
    $sql = "select *from student where id=abc";
    $PDOStatement = $pdo->query($sql);
}catch(Exception $error){
    //输出异常信息
    echo "错误编号：".$error->getCode();
    echo "<br>错误行号:".$error->getLine();
    echo "<br>错误信文件:".$error->getFile();
    echo "<br>错误信息:".$error->getMessage();

}

//获取错误信息
//echo "错误编号：".$pdo->errorCode();
//echo "<br>错误信息:";
print_r($pdo->errorInfo());

