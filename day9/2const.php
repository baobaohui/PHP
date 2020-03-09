<?php
class Student{
    //声明类常量
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = "root";

    //公共成员方法
    public function showInfo(){
        $str = "<h2>在类内访问常量</h2>";
        $str .= "主机名：".Student::DB_HOST;
        $str .= "<br>用户名：".Student::DB_USER;
        $str .= "<br>密码：".Student::DB_PASS;
        echo $str;
    }

}
$str = "<h2>在类外访问常量</h2>";
$str .= "主机名：".Student::DB_HOST;
$str .= "<br>用户名：".Student::DB_USER;
$str .= "<br>密码：".Student::DB_PASS;
echo $str;

//创建学生类对象
$obj = new Student();
$obj->showInfo();