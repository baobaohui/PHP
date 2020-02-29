<?php
//演示“用户错误”的触发
//输入一个年龄，如果年龄超过60或小于0，就触发一个notice错误；
function reg_user($a)
{
    if($a>60 || $a <0)
    {
        //trigger_error("我们自己触发的错误的提示信息",用户错误代码)
        trigger_error("年龄不在我们公司的投保范围内",E_USER_NOTICE);

    }
    else
    {
        echo "<br>用户资料审核通过";
    }
}
$age = 18;
reg_user($age);
echo "<br>再来一个需要审核的用户";
reg_user(66);


