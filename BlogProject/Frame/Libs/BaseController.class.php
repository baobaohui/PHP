<?php
namespace Frame\Libs;

abstract class BaseController
{
    protected $smarty = null;
    public function __construct()
    {
        //创建Smarty类的对象
        $smarty = new \Frame\Vendor\Smarty();
        //配置Smarty
        $smarty->left_delimiter = "<{";
        $smarty->right_delimiter = "}>";
        //指定新的编译目录：c:\windows\temp\view\
        $smarty->setCompileDir(sys_get_temp_dir().DS.'VIEW_C'.DS);
        //指定视图目录：./Home/View/Student/
        $smarty->setTemplateDir(VIEW_PATH);

        //给$this->smarty属性赋值
        $this->smarty = $smarty;
    }
}