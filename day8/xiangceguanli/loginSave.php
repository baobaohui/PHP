<?php

//包含连接数据库的公共文件
require_once ("conn.php");

//开启session会话
session_start();

//判断表单是否合法提交
if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token'])
{
    //获取表单数据
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $verify = $_POST['verify'];

    //判断验证码与服务器保存的是否一致,验证码不区分大小写
    if (strtolower($verify) != $_SESSION['captcha'])
    {
        echo "<h2>输入的验证码错误，请重新输入！</h2>";
        header("refresh:1;url=login.php");
        die();
    }

    //判断用户名和密码与数据库保存是否相同
    $sql = "select *from user where username='$username' and password='$password'";
    $result = mysqli_query($link,$sql);//返回结果集对象
    $record = mysqli_num_rows($result);//取回记录数
    if(!$record)
    {
        echo "<h2>用户名和密码不正确</h2>";
        header("refresh:3;url=login.php");
        die();
    }
    //保存用户信息到SESSION中
    $_SESSION['username'] = $username;

    //跳转到相册首页
    header("location:index.php");
}
else
{
    header("location:login.php");//跳转到login.php
//    header("refresh:3;url=./delete.php");

}
