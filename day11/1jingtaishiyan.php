<?php
//定义一个学生类
class Student
{
    //声明一个类常量
    const TITLE = "localhost";

    //声明一个成员方法
    public function showInfo()
    {
        echo "主机名:".self::TITLE;
        echo "<br>主机名：".static::TITLE;
    }
}

//定义SmartStudent类，并继承学生类
class SmartStudent extends Student{
    //声明一个类常量
    const TITLE = "127.0.0.1";
}

$obj = new SmartStudent();
echo Student::TITLE;
$obj->showInfo();