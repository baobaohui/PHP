<?php
//定义一个学生类
class Student
{
    private $name = "张三";
    protected $age = 20;
    public $edu = "本科";

    //克隆方法：当对象克隆完成时，自动调用的方法
    public function __clone()
    {
        // TODO: Implement __clone() method.
        $this->name = "李四";
        $this->age = 10;
    }

    public function showInfo()
    {
        //在类内遍历对象的属性
        echo "<h2>在类内遍历对象的属性</h2>";
        foreach($this as $key=>$value)
        {
            echo "\$this->{$key} = {$value}<br>";
        }
    }

    //可以变相地屏蔽错误
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "我喝多了";
    }

    //魔术方法__invoke():把对象当成函数调用时，自动调用
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        echo "invoke魔术方法";
    }
}

//创建学生类对象
$obj1 = new Student();
$obj1->showInfo();

$obj2 = clone $obj1;    //克隆对象
var_dump($obj1,$obj2);


//foreach
/*$arr = array(10,20,30,40);

foreach(数组护或对象 as 下标或属性=>数组元素值或对象属性值)
{
    //输出结果数组元素的值
}
foreach($arr as $key=>$value)
{
    //输出结果数组元素的值，或对象的值
}
foreach ($obj as $key=>$value)
{

}*/

//类外遍历对象的属性
echo "<h2>在类外遍历对象的属性</h2>";
foreach($obj1 as $key=>$value)
{
    echo "\$obj1->{$key} = {$value}<br>";
}

//有了 __toString魔术方法后 可以进行打印 该方法中的return
echo $obj1;

//魔术方法 __invoke 把对象当成函数调用
$obj1();

//数组当函数调用,数组元素的值，八大数据类型都可以
$arr = array(10,20,30);
$arr[0] = function (){
    echo "ok";
};

$arr[0]();