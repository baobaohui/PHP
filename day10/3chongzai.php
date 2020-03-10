<?php
class Student
{
    //私有的成员属性
    private $name = "张三";
    private $age = "10";


    //当访问不可访问属性的时候，__get()魔术方法会自动调用
    public function __get($n)
    {
        // TODO: Implement __get() method.
        return $this->$n;
//        return "私有属性无权访问";
    }

    //当给不可访问的属性赋值时，__set()魔术方法自动调用
    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->$name = $value;
    }

    //当对不可访问的属性应用isset()或empty()时，__isset()会自动调用
    public function __isset($name)
    {
        // TODO: Implement __isset() method.
        return isset($this->$name);
    }

    //当对不可访问属性调用unset()时，__unset()会被调用
    public function __unset($name)
    {
        // TODO: Implement __unset() method.
        unset($this->$name);
    }

    //当访问不存在或不可访问的方法时，魔术方法__call()自动调用
    //参数：$func是传递过来的方法名称，$args是传递过来的参数数组
    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        echo "方法{$name}(".implode(',',$arguments)."不存在或不可访问)";
    }

    //用静态化方式当访问不存在或不可访问的方法时，魔术方法__calStaticl()自动调用
    //参数：$func是传递过来的方法名称，$args是传递过来的参数数组
    public static function __callStatic($name, $arguments)
    {
        // TODO: Implement __call() method.
        echo "方法{$name}(".implode(',',$arguments)."不存在或不可访问)";
    }


}

//创建学生类对象
$obj = new Student();

//__get()
echo $obj->name;//访问私有属性
echo "{$obj->name}的年龄是{$obj->age}岁";

//__set()
$obj->name = "李四";
$obj->age = 5;


//__isset()
//判断私有属性是否存在
if (isset($obj_name))
{
    echo "存在";
}
else
{
    echo "不存在或不可访问";
}

//__unset()
unset($obj->name);


//__call()
$obj->showInfo("baobao",20);

//__callStatic()
Student::showInfo2("baobao",20);

var_dump($obj);