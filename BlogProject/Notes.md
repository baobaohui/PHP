## BlogProject Notes

### 之前开发项目的流程总结
    
    确定需求，写出功能文档，商讨大致前端界面，
    编写接口文档/数据库文档，进行程序设计(进行测试)
    分工，规划完成时间，
    测试，修改，上线，
    后期维护
    
    
### 项目开发流程
    
    1，需求分析
    2，概要设计
    3，详细设计
    4，编码工作
    5，测试工作
    6，交付和用户验收
    7，后期维护
    
博客系统概述
    
    1，博客系统介绍
    
    2，导入博客系统数据库
        博客系统数据库表简介：
            文章表 article
            文章分类表   category
            文章分类表测试 category2
            评论表     comment
            友情链接表   links
            用户表     user
    
    3，运行博客项目
        修改博客项目前端配置 ./Home/Conf/Config.php
        修改博客项目后端配置 ./Admin/Conf/Config.php
        
    4,博客项目的后台功能
        用户注册和登录
        用户管理
            添加用户，删除用户，修改用户，显示用户
        文章分类管理
            添加分类，删除分类，修改分类，显示分类
            实现无限级分类
        文章管理
            添加文章，删除文章，修改文章，显示文章列表，文章查询
        文章评论管理
            显示文章评论
    
    5，博客项目的前台功能
        文章
        评论
        点赞
        分享
        搜索
        按时间分类
        相关文章
        友情链接
    
    6，博客项目的目录划分
        ---index.php            前台入口文件
        ---admin.php            后台入口文件
        ---Frame/               框架核心类文件
        --------Libs/           自定义公共类文件
        --------Vendor/         第三方类             
        ---Home/                前台应用目录
        -----------Conf/        配置目录
        -----------Controller/  前端控制器
        -----------Model/       前端模型目录
        -----------View/        前端视图目录
        ---Admin/               后台应用目录
        -----------Conf/        配置目录
        -----------Controller/  后端控制器
        -----------Model/       后端模型目录
        -----------View/        后端视图目录   
        ---Public/              静态资源目录
        -------Home/            前端静态资源目录
        -----------Images/      前端图片目录
        -----------Css/         前端CSS目录
        -----------Js/          前端JS目录
        -------Admin/           后端静态资源目录
        -----------Images/      后端图片目录
        -----------Css/         后端CSS目录
        -----------Js/          后端JS目录
        ---Uploads/             上传文件目录     
    
博客项目MVC框架搭建
    
    1，前台配置文件：./Home/Conf/Config.php
    
    2,前台入口文件：index.php
    
    4,框架核心类文件：./Frame/Frame.class.php
    
    4,测试前端MVC框架是否运行正常

学生信息管理(前台)
    
    1，首页控制器 ./Home/Controller/IndexController.class.php
    2，首页模型类 ./Home/Model/IndexModel.class.php
    3，数据库工具类    ./Frame/Libs/Db.class.php

学生信息管理(后台)
    
    1,后台配置文件 ./Admin/Conf/Config.php
    
    2,后台入口文件 admin.php
    
    3,首页控制器 ./Admin/Controller/IndexController.class.php
    
    4,首页模型类 ./Admin/Model/IndexModel.class.php

封装 PDOWrapper 类

    1，为什么要封装PDOWrapper类
        博客项目中，所有类都定义了命名空间，系统的PDO没有定义命名空间
        对PDO中方法再次封装，可以简化操作
        对PDO的异常处理进行封装，方便对PDO错误处理统一管理
        
    2，创建PDOWrapper类：./Frame/Vendor/PDOWrapper.class.php

PDOWrapper类与MVC框架整合
    
    1，创建基础模型类：./Frame/Libs/BaseModel.class.php
    
    2，其他模型类继承基础模型类

工厂模型类的实现
    
    1，基础模型类添加 getInastance()静态方法
    
    2，首页控制器类index()方法修改

封装自己的Smarty类
    
    1，创建自己的Smarty类 ./Frame/Vendor/Smarty.class.php
        提示：把原始的Smarty文件夹，复制到./Frame/Vendor目录下
    
    2，创建基础控制器类：./Frame/Libs/BaseController.class.php
    
    3,首页控制器index()方法去修改