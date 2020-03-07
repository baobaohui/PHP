<?php

session_start();//  开启session会话

if(empty($_SESSION['username']))//判断用户是否登录
{
    //如果用户没有登录，则直接跳转到login。php
    header("location:login.php");
    die();
}

$_SESSION['token'] = uniqid();//产生表单验证随机字符串


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>上传照片</title>
    <style type="text/css">
        body,h2,form,a{
            margin:0px;
            padding: 0px;
        }
        body{
            font-size: 14px;
            color: #444;
            background-color:#00343f;
        }
        a{
            text-decoration: none;
            color: #444;
        }
        a:hover{
            color:red;
        }
        .box{
            width: 1000px;
            margin: 0px auto;
            background-color: white;
        }
        .title{
            text-align: center;
            padding: 10px 0px;
            border-bottom: 2px solid #444;
            background-color: #d0e9ff;
        }
        .title h2{
            font-size: 36px;
            padding: 10px;
        }
        form{
            padding: 30px;
            height: 400px;
        }
        form td{
            padding: 8px;
        }

    </style>
</head>
<body>
<div class="box">
<div class="title">
    <h2>上传照片</h2>
    <a href="index.php">返回首页</a>
    <a href="logout.php">退出登录</a>

</div>
<form action="uploadSave.php" method="post" enctype="multipart/form-data">
    <table align="center" width="600">
        <tr>
            <td width="100" align="right">照片标题：</td>
            <td><input type="text" name="title" size="60"></td>
        </tr>
        <tr>
            <td align="right">上传照片：</td>
            <td><input type="file" name="uploadfile"></td>
        </tr>
        <tr>
            <td align="right">照片描述：</td>
            <td><textarea type="text" name="intro" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="提交">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>
</div>
</body>
</html>
