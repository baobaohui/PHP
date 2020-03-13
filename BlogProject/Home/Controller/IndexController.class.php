<?php
//声明命名空间，空间名要与所在目录路径一直
namespace Home\Controller;
use \Frame\Libs\BaseController;
use Home\Model\IndexModel;

//定义首页控制器类
final class IndexController extends BaseController
{
    public function index()
    {
        //创建模型类对象
        $modelObj = IndexModel::getInstance();

        //获取多行数据
        $arrs = $modelObj->fetchAll();

        //包含视图文件
//        include VIEW_PATH."index.html";
        //向视图赋值，并显示视图
        $this->smarty->assign("arrs",$arrs);
        $this->smarty->display("index.html");
    }
}
