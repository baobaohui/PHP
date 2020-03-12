<?php
//定义两个变量
$name = "张三";
$age = 10;

//读取视图文件代码
$str = file_get_contents("2view.html");


//替换php标记为 { }
$str = str_replace('{','<?php echo ',$str);
$str = str_replace('}','?>',$str);

//将替换完成的字符串，再写入view.html
file_put_contents("2view.html",$str);

//包含视图文件
include "2view.html";
