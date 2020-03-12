## day12 Notes

### Smarty 模板引擎

模板引擎的工作原理
    
    1，如何实现HTML代码和PHP代码分离
        一个是HTML静态页面(视图文件，模板文件)，扩展名是.html,包含html，css，js
        一个是纯PHP程序页面(控制器文件)，扩展名是.PHP
    
        合并：在php文件的下方使用 include "./view.html" 包含视图文件
        
    2，如何完全去除视图文件中的PHP标记
        首先，视图中典型的PHP代码是这样的：<?php echo $name ?>
        然后，前端工程师喜欢 {$name} 这种标签
        最后：我们班{$name}替换成<?php echo $name ?>就实现了PHP代码和HTML代码的完全分离
        模板引擎的原理：就是替换，将{$name}转换成<?php echo $name ?>才能被PHP识别并解析
        如何替换呢：使用PHP替换函数str_replace(),将{ 替换成 <?php echo,将} 替换成 ?>
    
    3,常用PHP模板引擎介绍
        $Smarty,是模板引擎鼻祖，其他的模板引擎都是基于Smarty开发的
        Twig,symfony框架默认的模板引擎
        Blade:laravel框架默认的模板引擎    

Smarty快速入门
    
    1，Smarty是什么
        PHP模板引擎，实现php程序员与前端人员分离
        
    2，Smarty下载和目录结构

Smarty配置
    
    1，Smarty左右定界符配置
        在Smarty中，默认使用{ }作为变量的定界符，但是会与CSS,JS中的大括号冲突
            左定界符：$Smarty->left_delimiter="string"
            右定界符：$Smarty->right_delimeter="string"
            
    
    2,Smarty常用目录配置
        目录类别                默认目录    修改方法                    查看方法
        Smarty默认模板目录    ./templates $smarty->setTemplateDir()   $smarty->getTemplateDir()
        Smarty默认配置目录    ./configs   $smarty->setConfigDir()   $smarty->getConfigDir()
        Smarty默认编译目录    ./templates_c $smarty->setCompileDir()   $smarty->getCompileDir()
        Smarty默认缓存目录    ./cache     $smarty->setCacheDir()   $smarty->getCacheDir()
        Smarty默认插件目录    ./libs/plugins $smarty->setPluginDir()   $smarty->getPluginDir()
        
        查看Smarty常用目录配置，Smarty类文件的_construct()构造方法
    
Smarty模板中的变量
    
    1，Smary普通变量
        PHP中的所有变量，都可以在视图文件中使用
        使用$smarty->assign()向smarty模板床底普通变量
        使用$smarty->display()显示指定的视图文件
        在Smarty模板中，使用[]  . 来访问数组元素
        在Smarty模板总，使用 -> 来访问对象的属性和方法
        
        
    2，Smarty保留变量
        1)Smarty页面请求保留变量
            {smarty.get} 访问$_GET数组
            {smarty.post} 访问$_POST数组
            {smarty.request} 访问$_REQUEST数组
            {smarty.cookie} 访问$_COOKIE数组
            {smarty.session} 访问$_SESSION数组
            {smarty.server} 访问$_SERVER数组
            {smarty.files} 访问$_FILES数组

            在html页面直接写(地址栏传递参数username=admin) 
                用户名:<$ $smarty.get.username $>
                
        2)访问PHP的预定义常量
            语法：{$smarty.cost.预定义常量}
            
            在php中定义常量 define("DB_HOST","localhost");
            html中：主机名：<$ $smarty.const.DB_HOST $>
            
        3)Smarty时间戳保留变量
            语法：{$smarty.now}
            
            html页面中：
                    PHP时间戳：<{time()}> <br>
                    Smarty时间戳:<{$Smarty.now}><br>
                    
                    PHP时间戳格式化：<{date("Y-m-d H:i:s")}><br>
                    Smarty时间戳格式化：<{$smarty.now|date_format:'%Y-%m-%d %H:%M:%S'}>

            
    4，Smarty配置文件变量
        配置文件变量概述
        
        定义配置文件
            配置文件默认目录： ./configs
            设置配置文件目录：$smarty->setConfigDir()
            读取配置文件目录：$smarty->getConfigDir()
            配置文件扩展名：.ini或 .conf
            配置文件中注释： #
            配置文件变量分组：[]
            语法格式：配置名=变量值
            变量不带$符号，变量值不带引号
        
        设置新的配置文件 config.conf a=公司名称 b=公司简介
        php中使用$smarty->setConfigDir()重新配置文件目录
        html中
            //加载配置文件
            <{config_load file="config.conf"}>
            //在视图文件访问配置变量
            <{#a#}><br>
            <{$smarty.config.b}>
        
        4)配置文件分组
            载入分组配置文件变量：{config_load file="配置文件路径" section="分组名"}
            
            <{config_load file="config.conf" section=$smarty.get.lan}>
            多语言网站
            
            config.conf
            [cn]
                a = 公司简介
            [tw]
                a = 公司简介
Smarty循环--foreach
    
    1,foreach 语法格式
        语法格式1：{foreach $arr as $key=>$value}{/foreach}
        语法格式2：{foreach from=$myarr key="mykey" item="myitem"}{/foreach}
        提示：foreach 可以遍历所有类型的数组，包括：枚举数组，关联数组，混合数组
        
    
    2，实例：输出一维数组
    
    3，实例：输出二维数组
    
    4,foreach常用属性应用
        @key:输出当前值的索引，可能是整型索引，也可能是字符索引
        @index:当前数组的索引，从0开始
        @iteration:当前循环的次数，从1开始计算
        @first:当首次循环时，值为true
        @last:当最后一次循环时，值为true
        @total:是整个循环的次数,可以在foreach内部或外部使用
        
Smarty 循环 -- section 循环
    
    1，section 语法格式
        就是php中的for循环,可控制步长值
        {section name=" loop="" start="" step="" max="" show=""}   
            输出数组的内容
        {sectionelse}
            如果数组为空，则执行改代码
        {/section}
    
    2，实例：输出一维枚举数组
    
    3，实例：输出二维枚举数组

    4,section 控制循环起点，步长值

Smarty 条件判断，--if语句
    
    1，if中元运算符
    
    2，当兵年龄判断
        <{if $smarty.get.age gte 18 and $smarty.get.age lte 23}>
            <font color="blue">符合当兵的要求</font>
        <{/else}>
            <font color="red">不符合当兵的要求</font>

        <{/if}>
        
    3，表格隔行变色

Smarty 变量调节器
    
    1，Smarty变量调节器概述
        变量修饰器可以用于格式化变量
        使用修饰器，需要在变量的后面加上|(竖线)并且跟着修饰器名称
        修饰器可能还会有附加的参数以达到效果
        参数会跟着修饰器名称,用:(冒号)分开
        同时，默认全部PHP函数都可以作为修饰器来使用，而且修饰器可以被联合使用
        修饰器可以作用域任何类型的变量，数组或对象
        
        语法格式
            {变量|调节器1|调节器2|调节器N}
            {变量|调节器1:参数1:参数2|调节器2:参数1:参数2}
            
    2，Smarty常用变量调节器
           调节器      含义              PHP函数           示例演示
           upper    将变量值转成大写字母  strtoupper()    {$title|upper}
           lower            小写
           capitalize  每个单词的第一个字母大写 ucwords()   {$title}capitalize}
           nl2br        将变量中\n回车        nlb2r()     {$title|nl2br}
                        全部转换成HTML的<br>  
           replace      对变量进行简单的替换    str_replace() {$title|replace:'a':'b'}
           date_format  将日期和时间格式化成strftime()    strftime()  {$title|date_format:%Y-%m-%d}
           truncate     截取字符串到指定长度，默认长度是80  substr()    {$title|truncate:80:'..'}

### MVC
    
    MVC框架思想原理
    MVC框架简单示例演示
    
    MVC第1个版本：整合学生模块和新闻模块
    MVC第2个版本：基础模型类的实现
    MVC第3个版本：模型类的单例工厂类
    MVC第4个版本：控制器类的实现
    MVC第5个版本：添加学生信息
    MVC第6个版本：控制器类的进一步优化
    MVC第7个版本：删除新闻数据
    
MVC框架思想原理
    
    1，MVC概述
        Model View Controller,是模型model-视图view-控制器controller
        MVC 是一种设计思想和规范，模块化设计
    
    2，MVC各组件的功能
        Model(数据模型)用于处理应用程序数据逻辑的部分，通常模型对象负责在数据库中存取数据
        View(视图)是用于处理数据显示的部分，通常试图是依据模型数据创建的
        Controller(控制器)是应用程序中处理用户交互部分，通常控制器负责从视图读取数据
            控制用户输入，并向模型发送数据
            
    3，MVC原理图
    
    4，MVC思想简单演示
        1)，需求分析
        2)，控制器文件Controller.php
        3)，模型类文件Model.php
        
MVC实例：学生信息管理    
    
    1，实例：使用MVC思想展示学生信息列表
        1)学生控制器文件：StudentController.php
        2)学生模型类文件：StudentModel.class.php
        3)数据库工具类文件：Db.class.php
        
        总结：
            //包含视图文件
            include "view.html";
            
            //使用？号代替当前页面。php，使用ac代表删除或修改的行为
            <a href="?ac=1&type=1">显示日期</a>
            
            //使用私有的保存数据库对象的属性
            private $db = null;
            
            一个项目由多个功能构成：学生管理，新闻管理，用户管理，产品管理
            一个功能只有一个控制器
            一个模型类对应一张数据表操作
            一个控制器对应多个视图
            
MVC第1个版本：整合学生模块和desc新闻模块
    
    1，需求分析
        在MVC框架中，同时实现两个模块，学生信息模块，新闻模块
        控制器文件：StudentController.php,NewsController.php
        模型文件类：StudentModel.class.php,NewsModel.class.php
        视图文件：StudentIndexView.php,NewsIndexView.php
        提示：文件内部的响应路径，都要一一修改
    
MVC第10个版本：文件简单分目录
    
    Model目录
    Controller 目录
    View 目录
    Frame 目录：存放公共类

MVC第11个版本：前端控制器
    
    1，需求分析
        请求分发器，就是指index.php
        它的作用：决定使用哪个控制器，以及使用哪个方法
        前端控制器有了之后，在每次请求中，都应该包含两个信息，控制器名和动作名
        习惯上我们使用 c 代替 控制器名，a 代替动作名
        如果没有指定控制器名或动作，请使用默认控制器或动作来代替
        语法格式：index.php?c=控制器名$a=动作名&其他参数
        例如：index.php?c=Student&a=edit&id=100
                        c=News&a=index
    2，修改index.php文件
       
        
    3，修改视图文件导航栏地址和js跳转地址
    
    4，修改控制器方法中的跳转地址