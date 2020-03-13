<?php
////包含基础模型类
//require_once ("BaseModel.class.php");

//定义学生模型类
class StudentModel extends BaseModel
{
    //获取多行数据
    public function fetchAll()
    {
        //构建sql查询语句
        $sql = "select *from student order by id asc";

        //执行sql语句返回二维数组
        return $this->db->fetchAll($sql);
    }

    //获取一行数据
    public function fetchOne($id)
    {
        $sql = "select *from student where id={$id}";
        //执行sql语据，返回一维数据
        return $this->db->fetchOne($sql);
    }

    //删除记录
    public function delete($id)
    {
        //构建删除的sql语句
        $sql = "delete from student where id={$id}";
        return $this->db->exec($sql);
    }

    //插入记录
    public function insert($data)
    {
        //构建字段列表和值列表
        $fields = '';
        $values = '';
        foreach ($data as $key=>$value)
        {
            $fields .="$key,";
            $values .="'$value',";
        }
        //去除结尾的逗号
        $fields = rtrim($fields,',');
        $values = rtrim($values,',');

        //构建插入语句
        $sql = "insert into student($fields) values($values)";
//        echo $sql;
//        die();

        //执行sql语句，返回bool值
        return $this->db->exec($sql);
    }

    //更新记录
    public function update($data,$id)
    {
        //构建字段名-字段值的字符串
        $str = "";
        foreach ($data as $key=>$value)
        {
            $str .="{$key}='{$value}',";
        }
        //去除结尾的逗号
        $str = rtrim($str,',');

        //构建更新语句
        $sql = "update student set {$str} where id={$id}";

        //执行sql语句，返回布尔值
        return $this->db->exec($sql);
    }
}