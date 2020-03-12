<?php
//包含数据库工具类
require_once ("Db.class.php");

//定义学生模型类
class NewsModel
{
    private $db = null;
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

    //获取多行数据
    public function fetchAll()
    {

        //构建sql查询语句
        $sql = "select *from news order by nid asc";

        //执行sql语句返回二维数组
        return $this->db->fetchAll($sql);
    }

    //删除记录
    public function delete($nid)
    {
        //构建删除的sql语句
        $sql = "delete from news where nid={$nid}";
        return $this->db->exec($sql);
    }
}