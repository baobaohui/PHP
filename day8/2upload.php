<?php

//判断表单是否是合法操作
if(isset($_POST['token']) && $_POST['token']=='upload')
{
    //延时执行，网页在10s后执行完毕
    //网页没有结束，临时文件不会消失
    sleep(10);
    print_r($_FILES);


    //将上传的临时文件，移动到 ./upload/目录中
    $tmp_name = $_FILES['uploadfile']['tmp_name'];
    $dst_name = "./upload/img1.jpg";
    move_uploaded_file($tmp_name,$dst_name);

}
else
{
    echo "非法操作";
}