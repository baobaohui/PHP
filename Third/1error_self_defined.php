<?php

//自定义处理错误，分两步
//1，声明，我们自己使用自己的函数来处理错误
//set_error_handler("处理错误的自己的函数名")
set_error_handler("my_error_handler");
//2,定义该函数
function my_error_handler($errCode,$errMsg,$errFile,$errLine)
//参数解释  错误代号，错误信息，错误文件，错误行数
//此形参顺序固定，而且是有系统会调用该函数并传入实参数据
{
    //此函数中我们就可以去自己显示有关错误信息和记录信息
    $str = "<h1>大事不好了，发生错误了，快来人啊</h1>";
    $str .= "<br>发生时间：".date('Y-m-d H:i:s');
    $str .= "<br>错误代号：".$errCode;
    $str .= "<br>错误信息：".$errMsg;
    $str .= "<br>错误文件：".$errFile;
    $str .= "<br>错误行号：".$errLine;
    $str .="</p>";
    echo "$str";

    //记录错误--错误日志,FILE_APPEND 在原有文件上记性追加
    file_put_contents("./error.html",$str,FILE_APPEND);

}

//先输出几个出错的代码
echo "<br>v1 = $v1";    //  未定义的变量

include './no_this_file.php';   //载入失败

function I1(){}

I1();   //调用不存在的函数