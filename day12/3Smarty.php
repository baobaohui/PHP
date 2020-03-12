<?php
//包含Smarty类文件
require_once ("smarty-3.1.34/libs/Smarty.class.php");

//创建Smarty类的对象
$smarty = new Smarty();

//Smarty配置：修改左右界定符
$smarty->left_delimiter = "<{";
$smarty->right_delimiter = "}>";

//向视图赋一维数组
$arr = array(
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => 'root',
    'db_name' => 'php_test'
);

$arrs = array(
    array(1,'张三','男',24,6000,300),
    array(2,'张三','男',24,6000,300),
);

$arrss = array(1,'张三','男',10,20,30);

//向视图赋值
$smarty->assign("name","张三");
$smarty->assign("age",10);

$smarty->assign("arr",$arr);
$smarty->assign("arrs",$arrs);

$smarty->assign("arrss",$arrss);
//显示视图文件
$smarty->display("./2view.html");