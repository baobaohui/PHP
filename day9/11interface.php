<?php

//定义第一个接口
interface InterA
{
    const TITLE = "接口实例学习";

    //定义一个成员抽象方法
    public function showInfo($a,$b);

}

//定义第2个接口InterB
interface InterB
{
//    const TITLE = "第二个接口";    //同时继承的话不能有两个相同的常量

    //定义一个静态抽象方法
    public static function readMe();
}

//定义学生类，并实现接口功能
class Student2 implements InterA,InterB
{
    //接口中继承，不能重写常量

    //重写showInfo()抽象方法
    public function showInfo($name, $age)
    {
        // TODO: Implement showInfo() method.
        echo "{$name}的年龄是{$age}岁<br>";
    }

    //重写readMe()抽象方法
    public static function readMe()
    {
        // TODO: Implement readMe() method.
        echo self::TITLE;
    }
}
//创建学生类对象
$obj = new Student2();
$obj->showInfo("张三",20);
$obj->readMe();