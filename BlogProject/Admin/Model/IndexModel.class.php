<?php
namespace Admin\Model;
use Frame\Libs\Db;

//定义首页模型类
final class IndexModel
{
    //获取多行数据
    public function fetchAll()
    {
        //创建数据库工具类对象
        $db = Db::getInstance();

        //构建查询SQL语句
        $sql = "select *from student order by id asc";

        //执行sql语句，并返回二维数组
        return $db->fetchAll($sql);
    }
}