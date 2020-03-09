<?php
//实例，类的三大特性

//定义一个基础商品类
//基础类是为了继承
class Shop
{
    //私有属性
    private $name;//商品名称
    private $price;//商品价格

    //受保护的类的构造方法
    protected function __construct($name2,$price2)
    {
        $this->name= $name2;
        $this->price = $price2;
    }

    //受保护的显示商品方法
    protected function showInfo()
    {
        $str = "商品名称：{$this->name}";
        $str .= "<br>商品价格：{$this->price}";
        return $str;
    }
}

//创建手机类,并继承商品类
class Mobile extends Shop
{
    //私有的手机属性
    private $pinpai;//手机品牌
    private $city;  //手机产地

    //重写父类的构造方法
    public function __construct($name2, $price2,$pinpai2,$city2)
    {
        parent::__construct($name2, $price2);
        $this->pinpai = $pinpai2;
        $this->city = $city2;

    }

    //重写父类的showInfo()方法
    public function showInfo()
    {
        $str =  parent::showInfo(); // TODO: Change the autogenerated stub
        $str .= "<br>手机品牌：{$this->pinpai}";
        $str .= "<br>手机产地：{$this->city}";

        return $str;
    }
}

//创建手机类对象
$obj1 = new Mobile('苹果x',8888,'苹果','天津市');
echo $obj1->showInfo();