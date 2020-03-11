<?php
//声明一个命名空间,可以利用 \ 来分割子命名空间
//namespace App;
namespace App\Home\Controller;



//1，定义一个学生类
class Student
{
    private $name = "张三";
    private $age = 10;

    public function __construct()
    {
        echo "{$this->name}的年龄是{$this->age }岁";
    }
}

//2，定义一个普通函数
function getMaxInt()
{
    echo "php最大整数：".PHP_INT_MAX;
}

//定义一个局部常量 const
const TITLE = "命名空间 namespace";

//4，其他的普通代码
$a = 100;