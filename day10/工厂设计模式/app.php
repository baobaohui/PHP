<?php
//类的自动加载
spl_autoload_register(function ($className){
    //构建类文件的路径
    $filename = "$className.class.php";
    //如果类文件存在，则包含
    if (file_exists($filename)) require_once ($filename);
});

//创建矩形对象
$rectangle = Factory::getInstance("Rectangle");
$rectangle->draw();