<?php

//添加cookie数据
setcookie("username","admin");
setcookie("password","123456");

//读取cookie数据
echo "用户名：".$_COOKIE['username']."<br>";
echo "密码：".$_COOKIE['password']."<br>";


//为cookie设置有效期
setcookie("username2","bao",time()+1*24*3600);//一天


//cookie路径有效性
setcookie("username","hui",time()+24*3600,"/public");//cookie只在/public目录下生效

//域名有效性
setcookie("username","hui",time()+24*3600,"/","www.phplearn.com");

//是否仅https安全连接才能发送cookie
setcookie("username","hui",time()+24*3600,"/","www.phplearn.com",false);

//是否只能通过http协议来使用cookie,也可以使用js
setcookie("username","hui",time()+24*3600,"/","www.phplearn.com",false,false);



//打印$_COOKIE全局数组
print_r($_COOKIE);

?>
<script type="text/javascript">
    window.alert(document.cookie);

</script>
