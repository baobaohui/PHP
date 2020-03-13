<?php
//包含基础控制器类
//require_once ("./BaseController.class.php");

//定义最终的信息控制类
final class NewsController extends BaseController
{
    public function index()
    {
        //创建学生模型
        $modelObj = FactoryModel::getInstance("NewsModel");
        //获取多行数据
        $arrs = $modelObj->fetchAll();
        //包含学生首页视图文件
        include VIEW_PATH."NewsIndexView.html";
    }
    public function delete()
    {
        //获取地址栏传递的id
        $id = $_GET['id'];
        //创建新闻模类对象
        $modelObj = FactoryModel::getInstance("NewsModel");
        //判断是否删除成功
        if ($modelObj->delete($id))
        {
//            echo "<h2>id={$id}的记录删除成功！</h2>";
//            header("refresh:3;url=?");
//            die();
            $this->jump("id={$id}的记录删除成功","?p=Home&c=News");
        }
        else
        {
            $this->jump("id={$id}的记录删除失败","?p=Home&c=News");
        }
    }

}



/*//获取用户动作参数
$ac = isset($_GET['ac'])?$_GET['ac']:'index';

//创建新闻控制器对象
$controllerObj = new NewsController();

//根据用户的不同动作，调用不同的方法
$controllerObj->$ac();*/

//if($ac == 'delete')
//{
//    $controllerObj->delete();
//}
//else{
//    $controllerObj->index();
//}



