<?php
//定义教师类
class Teacher
{
    private $name ="张爱国";
    private $school = "北京科技大学";
    public function __construct()
    {
        echo "{$this->name}毕业于{$this->school}!";
    }
}