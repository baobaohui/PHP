<?php

class Student2{
    const TITLE = "<h2>学生类</h2>";

    protected $name = "张三";
    protected static $count = 60;

    protected static function readMe()
    {
        return __METHOD__;
    }
    protected function showInfo()
    {
        return __METHOD__;
    }
}

//继承
class SmartStudent extends Student2
{
    const TITLE = "parent关键字";
    public function abc()
    {
        $str = parent::TITLE;
        $str .= "班级人数：".SmartStudent::$count;
        $str .= "<br>性别：{$this->name}";
        $str .= "<br>静态方法：".self::readMe();
        $str .= "<br>成员方法:".$this->showInfo();
        echo $str;
    }
}

$s1 = new SmartStudent();
$s1->abc();