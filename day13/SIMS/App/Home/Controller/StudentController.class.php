<?php
////包含基础控制器类
//require_once ("./BaseController.class.php");

//定义最终的学生控制器类
final class StudentController extends BaseController
{
    public function index()
    {
        //创建学生模型
        $modelObj = new StudentModel();
        //获取多行数据
        $arrs = $modelObj->fetchAll();
        //包含学生首页视图文件
        include "./App/Home/View/Student/StudentIndexView.html";
    }
    public function edit()
    {
        //获取地址栏id
        $id = $_GET['id'];
        //创建学生模型类对象
        $modelObj = FactoryModel::getInstance("StudentModel");
        //获取指定id数据
        $arr = $modelObj->fetchOne($id);
        //包含修改的视图文件
        include "./App/Home/View/Student/StudentEditView.html";
    }
    public function update()
    {
        //获取表单数据
        $id = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['sex'] = $_POST['sex'];
        $data['age'] = $_POST['age'];
        $data['edu'] = $_POST['edu'];
        $data['salary'] = $_POST['salary'];
        $data['bonus'] = $_POST['bonus'];
        $data['city'] = $_POST['city'];

        //创建学生模拟类对象
        $modelObj = FactoryModel::getInstance("StudentModel");

        if($modelObj->update($data,$id))
        {
            $this->jump("id={$id}的记录更新成功！","?p=Home&c=Student");
        }
        else{
            $this->jump("id={$id}的记录更新成功！","?p=Home&c=Student");
        }
    }
    public function delete()
    {
        //获取地址栏传递的id
        $id = $_GET['id'];

        //创建学生模类对象
        $modelObj = FactoryModel::getInstance("StudentModel");
        //判断是否删除成功
        if ($modelObj->delete($id))
        {
            $this->jump("id={$id}的记录删除成功","?p=Home&c=Student");
        }
        else
        {
            $this->jump("id={$id}的记录删除失败","?p=Home&c=Student");

        }
    }
    public function add()
    {
        include "./App/Home/View/Student/StudentAddView.html";
    }
    public function insert()
    {
        //创建学生类对象
        $modelObj = FactoryModel::getInstance("StudentModel");

        //获取表单数据
        //获取表单提交数据
        $data['name'] = $_POST['name'];
        $data['sex'] = $_POST['sex'];
        $data['age'] = $_POST['age'];
        $data['edu'] = $_POST['edu'];
        $data['salary'] = $_POST['salary'];
        $data['bonus'] = $_POST['bonus'];
        $data['city'] = $_POST['city'];

        //调用模型类对象的insert()方法
        if ($modelObj->insert($data))
        {
            $this->jump("记录添加成功","?p=Home&c=Student");
        }
        else
        {
            $this->jump("记录添加失败","?p=Home&c=Student");
        }
    }
}



/*//获取用户动作参数
$ac = isset($_GET['ac'])?$_GET['ac']:'index';

//创建学生控制器类的对象
$controllerObj = new StudentController();

//根据用户的不同动作，调用不同的方法
$controllerObj->$ac();*/



//if($ac == 'delete')
//{
//    $controllerObj->delete();
//}
//elseif ($ac == 'add')
//{
//    $controllerObj->add();
//}
//elseif($ac == 'insert')
//{
//    $controllerObj->insert();
//}
//else{
//    $controllerObj->index();
//}



