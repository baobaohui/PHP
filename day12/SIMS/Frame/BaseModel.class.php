<?php
////包含数据库工具类
//require_once ("./Db.class.php");

//定义抽象基础模型类
abstract class BaseModel
{
    protected $db = null;
    //构造方法
    public function __construct()
    {
        //创建Db对象
        $arr = array(
            'db_host'=>'localhost',
            'db_user'=>'root',
            'db_pass'=>'135262',
            'db_name'=>'php_test',
            'charset'=>'utf8'
        );
        $this->db = Db::getInstace($arr);
    }
}