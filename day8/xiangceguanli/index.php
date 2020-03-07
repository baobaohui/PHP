<?php

require_once ("conn.php");//包含连接数据库的文件

session_start();//开启session会话

if (empty($_SESSION['username']))//判断用户是否登录
{
    header("location:login.php");
    die();
}

//获取多行相册数据
$sql = "select *from photos order by id desc";
$result = mysqli_query($link,$sql);//数据集对象
$arrs = mysqli_fetch_all($result,MYSQLI_ASSOC);//获取所有数据存在数组中
//print_r($arrs);
//die();

$records = mysqli_num_rows($result);//获取条数

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
        ul,li{
            list-style: none;
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
        .photos{
            padding: 15px;
        }
        .photos li{
            float:left;
            width: 280px;
            padding: 8px 5px;
            margin:10px;
            text-align: center;
        }
        .photos img{
            width: 280px;
            height: 160px;
        }
        .pagelist{
            height: 40px;
            line-height: 40px;
            text-align: center;
        }
        .pagelist a{
            padding: 8px 15px;
            border: 1px solid #ccc;
        }
        .pagelist a:hover{
            border: 1px solid #0000ff;
        }
        .pagelist .current{
            padding: 8px 15px;
        }

    </style>
</head>
<body>
<div class="box">
    <div class="title">
        <h2>我的相册</h2>
        <a href="upload.php">上传照片</a>
        <a href="logout.php">退出登录</a>
    </div>
    <div class="photos">
        <ul>
            <?php
                //循环 二维数组
                foreach($arrs as $arr) {
            ?>
                <li>
                    <a href="detail.php?id=<?php echo $arr['id']?>"><img src="<?php echo $arr['imgsrc'] ?>" alt=""></a>
                    <a href="detail.php?id=<?php echo $arr['id'] ?>"><?php $arr['title'] ?></a>
                </li>
            <?php
                }
            ?>
        </ul>

        <div style="clear: both;"></div>
        <div class="pagelist">
            <a href="">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">4</a>
            <a href="">5</a>
            <a href="">6</a>
        </div>
    </div>
</div>
</body>
</html>

