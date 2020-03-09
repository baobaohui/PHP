<?php
//定义抽象学生类
abstract class Student
{
    const TITLE = "抽象类，抽象方法";

    //定义成员抽象方法
    abstract protected function showInfo($a,$b);

    //定义静态的抽象方法
    abstract static public function readMe();

}

//定义SmartStudent学生类，并继承学生类
class SmartStudent extends Student
{
    //重写showinfo()抽象方法
    public function showInfo($name,$age)
    {
        // TODO: Implement showInfo() method.
        echo "{$name}的年龄是{$age}岁！<br>";
    }

    //重写readMe()抽象方法
    public static function readMe()
    {
        // TODO: Implement readMe() method.
        echo self::TITLE;
    }


}
//创建SmartStudent学生类对象
$obj = new SmartStudent();
$obj->showInfo("张三",20);
$obj->readMe();