<?php
//跳转到默认控制器
//header("location:./StudentController.class.php");

//包含所有类文件

//包含基础控制器类
require_once ("./Frame/BaseController.class.php");
//包含工厂模型类
require_once ("./Frame/FactoryModel.class.php");
//包含数据库工具类
require_once ("./Frame/Db.class.php");
//包含基础模型类
require_once ("./Frame/BaseModel.class.php");
//包含所有模型类
require_once ("./Model/StudentModel.class.php");
require_once ("./Model/NewsModel.class.php");


require_once ("./Controller/StudentController.class.php");
require_once ("./Controller/NewsController.class.php");

//原来控制器中的代码
//获取用户动作参数
//获取路有参数
$c = isset($_GET['c'])?$_GET['c']:'Student';
$a = isset($_GET['a'])?$_GET['a']:'index';
//创建控制器对象
$controllerClassName = $c."Controller";
$controllerObj = new $controllerClassName();

//根据用户的不同动作，调用不同的方法
$controllerObj->$a();