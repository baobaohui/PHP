<?php
//开启SESSION会话
session_start();

//读取SESSION数据
echo "用户名：".$_SESSION['username']."<br>";
echo "密码：".$_SESSION['password']."<br>";

//打印$_SESSION数组
print_r($_SESSION);