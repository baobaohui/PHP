<?php
//类的自动加载，注册类的加载规则
spl_autoload_register("funcl");
spl_autoload_register("funcl2");

function funcl($className)
{
    //构建类文件的路径
    $filename = "$className.class.php";

    //如果类文件存在，则包含
    if(file_exists($filename))
        require_once($filename);
}

//第二种规则
function funcl2($className)
{
    //构建类文件的路径
    $filename = "$className.cla.php";

    //如果类文件存在，则包含
    if(file_exists($filename))
        require_once($filename);
}

//创建学生对象
$obj1 = new Student();

//创建教师对象
$obj2 = new Teacher();