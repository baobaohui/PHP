<?php
//包含模型类文件
require_once ("./model.class.php");

$type = isset($_GET['type']) ? $_GET['type']:3;

$modelObj = new DateTime2();

//根据不同客户端参数，调用不同模型类方法
switch ($type)
{
    case 1:
        //调用模型类对象的getDate()方法
        $str = $modelObj->getDate();
        break;
    case 2:
        $str = $modelObj->getTime();
        break;
    default:
        $str = $modelObj->getDateTime();

}

//包含视图文件
include "view.html";