# PHP LearnNotes

## PHP BasicKnowledge
    
php 三种标记方式
    
php三种注释
        
    单行  //
    多行  /* */
    
变量
    
    $v1 = 1;
    $v2 = 2;
    $v3 = $v1+$v2;
    echo $v3;
    变量  内存空间
    
    变量命名规则
        开头：字母或下划线
        组成：字母，数字，下划线
        
    驼峰命名法
    
    变量四种基本操作
        赋值：本质为将变量名与一个数据建立联系，
             对该变量的操作就是对该内存地址上的数据的操作
        取值
        判断变量(isset)：
            $v1 = 1;
            $v2 = 2;
            $result = isset($v1)    //判断变量是否存在，将对变量v1的判断结果放入result中
            echo $result
            var_dump($result);  //输出变量完整信息
            
        删除/销毁变量(unset)
            unset($v1);//销毁该变量
            $result2 = isset($v1)
            var_dump(result);   //bool(false)
    
    值传递
        $v1 = 1;
        $v2 = $v1;  //传值
        
        传值结束后，变量无联系
        
    引用传值
        $v1 = 1;
        $v2 = &$v1;  //引用传值
        
        传值结束后，两变量有联系
    
    预定义变量
        $_GET变量，代表浏览器表单通过"get“方式提交的数据
            该变量里面会自动存储提交到某个文件中的GET数据
            
            <form action="get_data.php" method="get">
                姓名：<input type="text" name="username">
                <br>
                年龄：<input type="text" name="age">
                <br>
                <input type="submit" value="提交">           
            </form>
            
            数据处理：
            $name = $_GET['username'];
            $age = $_GET['age'];
            
            echo "<br>姓名为：",$name;
            echo "<br>年龄为：",$age;
            
        $_POST 变量，代表浏览器表单通过"get“方式提交的数据
             该变量里面会自动存储提交到某个文件中的POST数据
             和上述表单的区别 GET->POST
             
             可以进行向自我页面表单数据的发送
             通过isset进行判断
             if(isset($_POST['username'])
             {
                $usename = $_POST['usename'];
                echo $username
             }
             
             value="<?php echo $username ?>"
        
        $_REQUEST 变量
            get,post 方式提交的数据都能收到
            
            同时提交两种数据：
                表单action地址可以携带get数据，
                表单传递方式 POST
                
        $_SERVER 变量
            代表任何一次请求中，客户端或服务端的一些基本信息或系统信息
            常用的有：
                PHP_SELF;   表示当前请求的网页地址（不含域名部分）
                SERVER_NAME;    表示当前请求的服务器名
                SERVER_ADDR;    表示当前请求的服务器IP地址
                DOCUMENT_ROOT;  表示当前请求的网站物理路径(apche设置站点的那个)
                REMOTE_ADDR;    表示当前请求的客户端IP地址
                SCRIPT_NAME;    表示当前网页地址
                
            使用方式；
                echo "你的ip：",$_SERVER['REMOTE_ADDR'];
                $ip = $_SERVER['REMOTE_ADDR'];
                file_put_contents("ip地址.txt",$ip)
    可变变量
        变量名本身又是一个变量的变量
            $v1 = 10;
            echo $v1;
            $str = "v1";    //这是一个变量，名为str，值为“v1"(字符串)
            echo $$str;     //输出10，这里，“$$str”就是所谓的“可变变量”
        
        可变变量 -> 可变函数
        循环中使用
            $v1 =1;
            $v2 =2;
            $v3 =3;
            ....
            $result = $v1+$v2+$v3+...
            for($i=1;$i<=100;$i++)
            {
                $s = "v" . $i;  //连接两个字符
                $result += $$s; //$v1...相加的值
            }

常量
    
    常量需要用直接值进行赋值
        const PI = 1+1; 是不对的
        
    
    define()函数形式
        define('常量名',对应的常量值)
        define("PI",3.14)
        
    const 关键字定义
        const 常量名 = 对应的常量值
        const PI = 3.14
        
    常量判断
        if(!defined("PI"))
        {
            define("PI",3.14)
        }
    
    预定义常量
        PHP语言内部预先定义好的常量，如：
        PHP_VERSION;    表示当前的版本信息
        PHP_VERSON;     表示当前php运行所在的系统信息
        PHP_OS;         表示当前php运行所在的系统信息
        PHP_INT_MAX;    表示当前版本php中的最大整数值
        M_PI;           表示圆周率(一个有10多位小数的数)
    
    魔术常量
        形式上为常量，而值是变化的，如：
        __DIR__;        代表当前php网页文件所在的目录
        __FILE__;       代表当前php网页文件本身的路径
        __LINE__;       代表当前这个常量所在的行号