<?php
//类的自动加载，注册类的加载规则,匿名函数加载规则
spl_autoload_register(function ($classNmae){
    //构建所有不同规则类文件路径
    $arr = array(
        "$classNmae.class.php",
        "$classNmae.cla.php",
    );

    //循环数组
    foreach($arr as $filename)
    {
        //如果类文件存在，则包含
        if(file_exists($filename)) require_once($filename);
    }
});

//创建学生对象
$obj1 = new Student();

//创建教师对象
$obj2 = new Teacher();