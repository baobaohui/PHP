<?php
//单例设计模式的核心代码
class Db
{
    //私有的静态的保存对象的属性
    private static $obj = null;

    //私有的构造方法：阻止类外new 对象
    private function __construct()
    {
    }

    //私有的克隆方法：阻止类外clone对象
    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    //公共的静态的创建对象的方法
    public static function getInstace()
    {
        //判断当前对象是否存在
        if(!self::$obj instanceof self) //instance 判断一个对象是不是某个类的对象
        {
            //如果对象不存在，创建并保存它
            self::$obj = new self();
        }

        //返回对象
        return self::$obj;
    }
}
//创建数据库类的对象
$db1 = Db::getInstace();
$db2 = Db::getInstace();
var_dump($db1,$db2);