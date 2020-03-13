<?php
//声明命名空间，空间名要与所在目录路径一直
namespace Admin\Controller;
use Admin\Model\IndexModel;

//定义首页控制器类
final class IndexController
{
    public function index()
    {
        //创建模型类对象
        $modelObj = new IndexModel();

        //获取多行数据
        $arrs = $modelObj->fetchAll();

        //包含视图文件
        include VIEW_PATH."index.html";
    }
}
