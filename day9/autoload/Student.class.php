<?php
//定义一个学生类
class Student
{
    private $name ="张三";
    private $age = 20;
    public function __construct()
    {
        echo "{$this->name}的年龄是{$this->age}岁";
    }
}