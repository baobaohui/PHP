<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>PHP Connect</h1>

<?php
echo "Hello World!";
echo "<br>";
echo date("当前时间：Y-m-d h:i:s");
//echo data("星期 w");
echo "<br>";

$db_host = "localhost";
$db_port = "3306";
$db_user = "root";
$db_pass = "135262";
$db_name = "hhelp";
$charset = "utf-8"; //字符集


//1,连接数据库
//$mysqli = new mysqli("localhost","root","135262","hhelp");
$my = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if ( $my )
{
    echo 'connect success!';
}
else
{
    echo 'connect fail!';
    echo "<br>系统错误信息：".mysqli_connect_error();  //2,打印错误信息
}

//3,选择指定数据库
if(!mysqli_select_db($my,$db_name))
{
    echo "<br> 选择数据库{$db_name}失败";
    die();
}
else
{
    echo "<br>连接数据库成功<br>";
}

//4,设置数据库返回数据字符集
mysqli_set_charset($my,$charset);


//5,执行查询的sql语句

//查询数据 返回一个对象，不是具体数据
// object(mysqli_result)#2 (5)
// { ["current_field"]=> int(0) ["field_count"]
//      => int(7) ["lengths"]
//      => NULL ["num_rows"]
//      => int(1) ["type"]
//      => int(0) }

$sql = "select *from h_user";



//完成密码更新 返回 bool(true)
#$sql = "update h_user set password=123456789 where id=1";

$result = mysqli_query($my,$sql);
var_dump($result);
echo "<br>";
//7.1，从结果集中获取一行数据，并作为枚举数组返回
//每次取一行，可使用 while取完所有数据
$arr = mysqli_fetch_row($result);
print_r($arr);
#print $arr; //数组到字符串的转换出错
#echo "<br>使用echo 输出 arr".$arr; //出错

//while 循环取数据
//while（$arr=mysqli_fetch_row($result))
//{
//    print_r($arr);
//}

//7.2 从结果集中获取一行数据，并作为关联数组(字段名做下标)返回
// $arr = mysqli_fetch_assoc($result);

//7.3 从结果集中取得一行作为关联数组或数字数组或二者都有
// 省略第二个参数 m默认值为MYSQLI_BOTH
//$arr = mysqli_fetch_array($result);

//MYSQLI_BOTH     两者兼有，默认
//MYSQLI_ASSOC    关联索引
//MYSQLI_NUM      数字索引
//$arr = mysqli_fetch_array($result,MYSQLI_ASSOC);

//7.4  从结果集中取得所有行作为关联数组，枚举数组，或二者兼有
//$arr = mysqli_fetch_all($result);
//print_r ($arr);

//8，从结果集中获取记录数
$records = mysqli_num_rows($result);
echo "<br>查询到的记录数：".$records;

//8.2  取得一次MySQL操作所影响的记录行数
$records2 = mysqli_affected_rows($my);
echo "<br>更新的数据跳数为：".$records2;

//6,手动销毁结果集变量,数据一旦获得就销毁变量，节省每次请求的时间
mysqli_free_result($result);


//数据操作完毕，断开连接，不再占用连接通道
mysqli_close($my);
?>
</body>
</html>
