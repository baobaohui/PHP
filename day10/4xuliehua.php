<?php
//数组变量序列化
$arr = array(
    'db_host'=>'localhost',
    'db_user'=>'root',
    'db_pass'=>'135262',
    'db_name'=>'php_test',
    'charset'=>'urf8'
);

//序列化：将变量转成可保存的字符串
//$str = serialize($arr);

//将序列化字符串，保存到记事本
//file_put_contents('./1.txt',$str);


//反序列化字符串
//读取记事本的数据
$str = file_get_contents('./1.txt');

//将序列化字符串，还原成变量
$arr = unserialize($str);

//打印变量
print_r($arr);