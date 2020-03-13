<?php
namespace Home\Model;
use Frame\Libs\BaseModel;

//定义首页模型类 并继承基础模型类
final class IndexModel extends BaseModel
{
    //获取多行数据
    public function fetchAll()
    {
        //创建数据库工具类对象
//        $db = Db::getInstance();

        //构建查询SQL语句
        $sql = "select *from student order by id asc";

        //执行sql语句，并返回二维数组
        return $this->pdo->fetchAll($sql);
    }
}