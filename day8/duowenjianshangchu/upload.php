<?php
//判断表单是否合法提交
if (isset($_POST['token'])&&$_POST['token']=='upload')
{
    print_r($_FILES);

    //将三维数组转成二维数组
    $arrs = $_FILES['uploadfile'];

    //循环判断，只需要移动有文件上传的
    foreach($arrs['name'] as $key=>$name)
    {
        //如果文件不测，则移动文件
        if ($name != "")
        {
            $ext = pathinfo($name,PATHINFO_EXTENSION);
            $tmp_name = $arrs['tmp_name'][$key];
            $dst_name = "../upload/".uniqid().".".$ext;
            move_uploaded_file($tmp_name,$dst_name);
        }
    }
}
else
{
    echo "非法操作";
}
