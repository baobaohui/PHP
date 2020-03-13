<?php
////包含基础模型类
//require_once ("BaseModel.class.php");

//定义学生模型类继承基础模型类
class NewsModel extends BaseModel
{
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