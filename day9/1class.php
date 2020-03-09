<?php

//定义类的语法格式
class Student
{
    //类的代码

    public $name = "张三";
    public $age = 24;

    private $sex = 1;
    protected $hobby;

    protected function showLine()
    {
        return "<hr>";
    }
    public function showInfo()
    {
        echo __FILE__;//获取当前文件的路径

        return 1;
    }

    public function test($name,$age)
    {
        //$this的调用
        return "{$name}的年龄是{$this->age}";

        $str = "<h2>{$this->name}的基本信息</h2>";
        $str .=$this->showLine();

        echo "{$name}---{$age}<br>";
    }

}

//语法说明
/*
    1，class 是声明类的关键字
    2,类中只有两种内容：
            成员属性：普通变量
            方法：普通函数
       其余的东西可以写在方法中
*/

//实例化对象
$obj = new Student();

var_dump($obj);
echo "<br>";

echo "打印对象属性为：".$obj->name;

//删除属性：使用unset()可以删除变量，数组元素，对象属性等
unset($obj->age);
//$obj->age;
echo "<br>";

$obj2 = new Student();
var_dump($obj2->test('123',123));

//echo $obj2->age."<br>";
//
//echo $obj2->test('baobaohui',12);

//一，常量定义语法格式
/*
 * const 常量名 = 常量值;
 *
 * 1,常量名建议用大写
 * 2，const定义的常量必须要赋值
 * 3，常量的值，一定是一个定值
 * 4，常量没有权限修饰符
 *
 *
 * 二，访问类常量
 * 使用类名访问类的元素，这种方式称为：静态化调用方式
 * 类常量，不用创建对象，直接就能访问
 * className::常量名；
 * */