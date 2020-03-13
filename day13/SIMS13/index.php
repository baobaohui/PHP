<?php

//包含框架初始类文件
require_once ("./Frame/Frame.class.php");
//调用框架的初始化方法
Frame::run();



/*
//跳转到默认控制器
//header("location:./StudentController.class.php");

//原来控制器中的代码
//获取用户动作参数
//获取路有参数
$p = isset($_GET['p'])?$_GET['p']:'Home';//平台参数
$c = isset($_GET['c'])?$_GET['c']:'Student';//控制器名
$a = isset($_GET['a'])?$_GET['a']:'index';//动作名

//定义$p 常量
define("PLAT",$p);

//定义目录常量
define("DS",DIRECTORY_SEPARATOR);//动态目录分割符
define("ROOT_PATH",getcwd().DS);//当前目录
define("FRAME_PATH",ROOT_PATH."Frame".DS);//Frame目录
define("MODEL_PATH",ROOT_PATH."App".DS.PLAT.DS."Model".DS);//Model目录
define("CONTROLLER_PATH",ROOT_PATH."App".DS.PLAT.DS."Controller".DS);//Controller目录
define("VIEW_PATH",ROOT_PATH."App".DS.PLAT.DS."View".DS.$c.DS);//View目录


//类的自动加载
spl_autoload_register(function ($className){
    //类文件路径数组
    $arr = array(
        FRAME_PATH."$className.class.php",
        MODEL_PATH."$className.class.php",
        CONTROLLER_PATH."$className.class.php"
    );
    //循环数组
    foreach($arr as $filename)
    {
        if(file_exists($filename))
        {
            echo $filename."<br>";  //打印调用类的信息
            require_once ($filename);
        }
    }
});

//创建控制器对象
$controllerClassName = $c."Controller";
$controllerObj = new $controllerClassName();

//根据用户的不同动作，调用不同的方法
$controllerObj->$a();
*/

/*
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
require_once ("./App/$p/Model/StudentModel.class.php");
require_once ("./App/$p/Model/NewsModel.class.php");

require_once ("./App/$p/Controller/StudentController.class.php");
require_once ("./App/$p/Controller/NewsController.class.php");
*/




