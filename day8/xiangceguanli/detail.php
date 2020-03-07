<?php
//包含连接数据库的公共文件
require_once ("conn.php");

session_start();//开启session会话

if (empty($_SESSION['username']))//判断用户是否登录
{
    header("location:login.php");
    die();
}

$id = $_GET['id'];//获取地址栏的id

//更新访问量
$sql = "update photos set hits=hits+1 where id =$id";
mysqli_query($link,$sql);

$sql = "select *from photos where id=$id";//构建查询sql语句
$result = mysqli_query($link,$sql);//返回结果集对象
$arr = mysqli_fetch_assoc($result);//获取一行数据

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>详情页面</title>
    <style type="text/css">
        body,ul,li,h2,a{
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
        .detail{
            padding: 15px 100px;
        }
        .photo div{
            text-align: center;
        }
        .detail img{
            width: 100%;
        }
        .detail p{
            font-size: 16px;
            text-indent: 36px;
            font-family: 微软雅黑;
            line-height: 28px;
        }

    </style>
</head>
<body>
<div class="box">
    <div class="title">
        <h2><?php echo $arr['title'] ?></h2>
        访问 <font color="red"><?php echo $arr['hits'] ?></font>次
        发布时间 <font color="red"><?php echo date("Y-m-d H:i:s",$arr['addate']) ?></font>
        <a href="index.php">返回首页</a>
    </div>

    <div class="detail">
        <div class="photo">
            <img src="<?php echo $arr['imgsrc'] ?>" align="center">
        </div>
        <p>
            <?php echo $arr['intro'] ?>
        </p>
    </div>
</div>
</body>
</html>