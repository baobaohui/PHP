<?php
class Student{


    //私有的成员属性
    //所有数据都来自外部传递，所有属性一般都是私有的
    private $name;
    private $sex;
    private $age;

    //公共的构造方法
    public function __construct($name,$sex,$age)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->age = $age;

    }

    //公共成员方法
    public function showInfo(){

        $str = "姓名：{$this->name}";
        $str .= "<br>性别：$this->sex";
        $str .= "<br>年龄：{$this->age}";
        echo $str;
    }

}
$obj = new Student("张三","男",23);
$obj->showInfo();