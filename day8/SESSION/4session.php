<?php

//首先开启session_start()会话，产生新的sessionid或重用传递过来的sessionid
//产生新的sessionID，并创建对应的session文件
session_start();


//添加session 数据
$_SESSION['username']="admin";
$_SESSION['password']="123456";
