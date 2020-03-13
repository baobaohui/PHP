<?php
////包含工厂模型类
//require_once ("FactoryModel.class.php");

//定义抽象的基础控制器类
abstract class BaseController
{
    //受保护的跳转方法
    protected function jump($message,$url='?',$time=3)
    {
        echo "<h2>{$message}</h2>";
        header("refresh:{$time};url={$url}");
        die();
    }
}