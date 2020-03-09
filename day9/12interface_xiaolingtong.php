<?php
//定义小灵通的接口
interface XiaoLingTong
{
    //定义打电话的抽象方法
    public function tel();
}

//定义MP3接口
interface MP3
{
    //定义听音乐的抽象方法
    public function music();
}

//定义MP4接口，并继承MP3接口
interface MP4 extends MP3
{
    //定义看电影的抽象方法
    public function video();
}

//定义手机类，并实现以上所有接口功能
class Mobile implements XiaoLingTong,MP4
{
    //重写tel方法
    public function tel()
    {
        // TODO: Implement tel() method.
        echo "正在打电话!<br>";
    }

    //重写music方法
    public function music()
    {
        // TODO: Implement music() method.
        echo "正在听音乐!<br>";

    }

    //重写video方法
    public function video()
    {
        // TODO: Implement video() method.
        echo "正在看电影!<br>";
    }

    public function game()
    {
        echo "正在打游戏！";
    }
}

$obj = new Mobile();
$obj->tel();
$obj->music();
$obj->video();
$obj->game();