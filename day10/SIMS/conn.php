<?php //数据库连接公共文件

//类的自动加载
spl_autoload_register(function ($className){
   //构建类文件的路径
    $filename = "$className.class.php";

    //如果类文件存在，则包含
    if(file_exists($filename))
    {
        require_once($filename);
    }
});

//创建数据库类的对象
$arr = array(
    'db_host'=>'localhost',
    'db_user'=>'root',
    'db_pass'=>'135262',
    'db_name'=>'php_test',
    'charset'=>'urf8'
);

$db = Db::getInstace($arr);
//var_dump($db);

//测试exec()方法
//$result = $db->exec("update student set salary=salary+1 where id=1");
//var_dump($result);

//测试fetchOne方法
//$arr = $db->fetchOne("select *from student limit 1",3);
//print_r($arr);