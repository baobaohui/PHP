<?php

require_once ("conn.php");//包含连接数据库文件

session_start();//开启session会话

if (empty($_SESSION['username']))//判断用户是否登录
{
    header("location:login.php");
    die();
}

//判断表单来源是否合法
if (isset($_POST['token']) && $_POST['token'] == $_SESSION['token'])
{

    //上传图片
    //1，判断上传图片是否有错误发生
    if (@$_FILES['uploadFile']['error'] != 0 )
    {
        echo "<h2>上传图片错误，请重试！</h2>";
        header("refresh:3;url=upload.php");
        die();
    }
    //2,判断上传文件的类型是不是图片，从扩展名和内容两方面进行判断
    $arr1 = array("image/jpeg","image/png","image/gif");

    //创建finfo的资源：获取文件内容类型，与扩展名无关
    $finfo = finfo_open(FILEINFO_MIME_TYPE);

    //获取文件内容的原始类型，不会随着扩展名改变而改变
    $mime = finfo_file($finfo,$_FILES['uploadfile']['tmp_name']);
    if (!in_array($mime,$arr1))
    {
        echo "<h2>上传的必须是图像！</h2>";
        header("refresh:3;url=upload.php");
        die();
    }

    //3,判断上传的文件扩展名是不是图片
    $arr2 = array("jpg","png","gif");
    $ext = pathinfo($_FILES['uploadfile']['name'],PATHINFO_EXTENSION);
//    echo $ext;
//    die();
    if (!in_array($ext,$arr2))
    {
        echo "<h2>上传的必须是图像！</h2>";
        header("refresh:3;url=upload.php");
        die();
    }

    //4,移动图片到images目录中
    $tmp_name = $_FILES['uploadfile']['tmp_name'];
    $dst_name = "image/".uniqid().".".$ext;
    move_uploaded_file($tmp_name,$dst_name);

    //5，将相关数据插入到数据库中
    //获取表单提交数据

    $title = "\"".$_POST['title']."\"";

    $imgsrc = "\"".$dst_name."\"";

    $intro = "\"".$_POST['intro']."\"";
    $hits = 0;
    $addate = time();

    $sql = "insert into photos(title,imgsrc,intro,hits,addate) values($title,$imgsrc,$intro,$hits,$addate)";
//    print_r($sql);
//    die();
    mysqli_query($link,$sql);




    //再次跳转到页面
    echo "<h2>插入成功！</h2>".time();
    header("refresh:3;url=upload.php");

}
else
{
    header("index.php");
}