<?php
class Student{

    //公共的析构方法
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo "对象即将销毁";
    }
}

//创建学生类对象
$obj = new Student();


unset($obj);//手动删除，所以先打印 对象即将销毁这个语句
echo "这是网页的最后一行代码<br>";

//网页执行完毕，调用析构方法，再删除对象