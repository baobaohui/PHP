<?php
//定义最终的框架初始化类
final class Frame
{
    //公共的静态的框架初始化方法
    public static function run()
    {
        self::initConfig();     //初始化配置信息
        self::initRoute();      //初始化路有参数
        self::initConst();      //初始化目录常量
        self::initAutoLoad();   //初始化类的自动加载
        self::initDispatch();    //初始化请求分发
    }

    //私有的静态的初始化配置信息
    private static function initConfig()
    {
        $GLOBALS['config'] = require_once ("./App/Conf/Config.php");
    }

    //私有的静态的初始化路有参数
    private static function initRoute()
    {
        //获取路由参数
        $p = isset($_GET['p'])?$_GET['p']:$GLOBALS['config']['default_platform'];//平台参数
        $c = isset($_GET['c'])?$_GET['c']:$GLOBALS['config']['default_controller'];//控制器名
        $a = isset($_GET['a'])?$_GET['a']:$GLOBALS['config']['default_action'];//动作名
        //定义$p 常量
        define("PLAT",$p);
        define("CONTROLLER",$c);
        define("ACTION",$a);
    }

    //私有的静态的初始化目录常量
    private static function initConst()
    {
        //定义目录常量
        define("DS",DIRECTORY_SEPARATOR);//动态目录分割符
        define("ROOT_PATH",getcwd().DS);//当前目录
        define("FRAME_PATH",ROOT_PATH."Frame".DS);//Frame目录
        define("MODEL_PATH",ROOT_PATH."App".DS.PLAT.DS."Model".DS);//Model目录
        define("CONTROLLER_PATH",ROOT_PATH."App".DS.PLAT.DS."Controller".DS);//Controller目录
        define("VIEW_PATH",ROOT_PATH."App".DS.PLAT.DS."View".DS.CONTROLLER.DS);//View目录
    }

    //私有的静态的初始化类的自动加载
    private static function initAutoLoad()
    {
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
    }

    //私有的静态的初始化请求分发：创建哪个控制器类的对象？调用控制器对象的哪个方法？
    private static function initDispatch()
    {
        //创建控制器对象
        $controllerClassName = CONTROLLER."Controller";
        $controllerObj = new $controllerClassName();

        //根据用户的不同动作，调用不同的方法,常量不能用作方法名
        $action_name = ACTION;
        $controllerObj->$action_name();
    }
}