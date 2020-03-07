<?php

//开启session会话
session_start();

//删除session数据
unset($_SESSION['username']);
//unset($_SESSION['password']);


//销毁session文件
session_destroy();

echo "<h2>退出登录！</h2>";
header("location:login.php");
