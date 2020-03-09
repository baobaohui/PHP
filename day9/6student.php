<?php
class Student{

    const TITLE = "<h2>学生类</h2>";

    private $name;
    private $sex;
    private $age;

    private static $count=0;

    //构造方法
    public function __construct($name,$sex,$age)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->age = $age;

        self::$count +=1;
//        echo "{$this->name}加入班级，当前有".self::$count."个学生！";
        $this->showInfo();//调用显示方法
    }

    //私有的展示信息
    private function showInfo()
    {
        $str = self::TITLE;
//        $str .= "当前文件名：".__FILE__;
//        $str .= "<br>当前函数名:".__FUNCTION__;
//        $str .= "<br>当前的方法名称：".__METHOD__;
//        $str .= "<br>班级人数：".self::$count;//self::$count
        $str .= "姓名：{$this->name}";
        $str .= "<br>性别：{$this->sex}";
        $str .= "<br>年龄：{$this->age}";
        $str .= "<br>{$this->name}加入班级，当前有".self::$count."个学生";


          echo $str;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        echo "<br>有学生对象被删除<br>";
        self::$count--;//在线人数减一
    }
}

$s1 = new Student("张三","男",18);
echo "<hr>";
$s2 = new Student("小五","女",18);
//$s2->showInfo();
$s3 = new Student("张四","男",18);
echo "<hr>";
$s4 = new Student("张六","男",18);
echo "<hr>";
//手动删除一个对象
unset($s1);
$s5 = new Student("张七","男",18);
echo "<hr>";
var_dump($s5);