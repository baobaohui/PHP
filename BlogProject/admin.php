<?php
//常量定义
define("DS",DIRECTORY_SEPARATOR);//动态目录分隔符
define("ROOT_PATH",getcwd().DS);//当前目录
define("APP_PATH",ROOT_PATH."Admin".DS);//Home目录


//包含框架初始类文件
require_once("./Frame/Frame.class.php");
//调用框架的初始化方法
Frame\Frame::run();