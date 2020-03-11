<?php
require_once ("2namespace.php");

$obj = new App\Home\Controller\Student();//使用命名空间下的类

App\Home\Controller\getMaxInt();//使用命名空间下的 函数

App\Home\Controller\TITLE;

//4，普通代码，直接调用
echo "<br>".$a;

//给命名空间起别名
use App\Home\Controller\Student as Student1;

$obj = new Student1();