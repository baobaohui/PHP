# PHPLearningNotes

## day1
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

# day2 Notes

## 数据类型

标量类型


    整数类型:integer,int
        2进制     0b开头
        8进制     0开头
        10进制    
        16进制    0x开头
        
        进制转换：可使用系统函数完成转换
        bin-2,oct-8,dec-10,hex-16
            decbin();   将10进制转为2进制
            decoct();   将10进制转为8进制
            dechex();   将10进制转为16进制
            
            或
            
            bindec();   将2进制数字字符串转为10进制
            octdec();   将8进制数字字符串转为10进制
            hexdec();   将16进制数字字符串转为10进制
            
            $n1 = 100;
            $m1 = decbin($n1);
            
        
    浮点数:double,float
        科学计数法
            $f1 = 1.23e;    //表示1.23乘以10的3次方
        
        注意：
            浮点数不要随便做 相等 == 比较，由于精度原因，不可靠
            $v1 = 0.1
            $v2 = 0.2
            $v3 = 0.3
            if($v3 == $v1+$v2)
            {
                echo "相等";
            }
            else
            {
                echo "不相等";
            }
        进行小数点后四位的经度比较，乘以10000，然后转换为整数比较
            if(round($v1 * 10000) == round(($v1+$v2)*10000))
            {
                echo "相等";
            }
            else
            {
                echo "不相等";
            }
        
    布尔类型:boolean,bool
        true,false
    
    字符串类型:string
        $title = '社会变迁';
        $name = "张三";
        单引号和双引号字符串
        双引号字符串中，如果出现"$"符号，则该符号后的连续字符会被识别为一个变量名
        如果不存在该变量会报错
            $n = 12;
            echo "n的值：$n";     
            echo "n的值：",$n; 两者相同
            echo "$n 的值：$n" => 12 的值： 12
            echo "\$n 的值：$n" =>\$n 的值：12

复合类型
    
    数组类型 array
        $info = array("张三丰",18,"男“);
        $info = ["张三丰",18,"男“]; 新版本中的写法

        $info = array('name'=>'张三丰','age'=>18,'gender'=>'男');//关联数组
        echo $info['name'];
        print_r($info); //打印该数组
        echo "</pre>";
    
    对象
    
特殊类型
    
    空类型
        有且只有一个数据可以使用，是null
        
    资源类型
        resource:表示一种外部的可供php使用的资源

类型判断
    
    gettype();  获取一个变量的类型，结果为一个比阿娘类型的名称
    
    $v1 = 10;
    $r1 = gettype($v1); //结果为："integer"
    echo gettype($r1);  //结果为string
    
    php是一门弱类型语言
    
    类型系列函数
        is_int()/is_integer();  判断是否为整数类型
        is_float(); 判断是否为浮点类型
        is_bool();
        is_string();
        is_array();
        is_numeric();   判断是否为数字类型
        is_object();
        
    两个特殊判断
        isset();判断一个变量是否存在或变量中是否有数据，有返回true
        empty();判断是否为空，是返回true，否返回false;
    
类型转换
    
    自动转换
        $v1 = 1 + "3";  // 4
        $v2 = 1 . "3";  //"." 是字符串连接符，结果 ”13“
        $v3 = "12" . true;  //“121”，true转为字符串为“1”
        $v4 = "12" . false; //"12",false转为字符串为“”
        
        1 + “abc" = 1;
        1 + "2abc" = 3;
        1 + "abc2" = 1;
        1.2 + 2.2abc" = 3.4;
        
    强制转换
        使用强制转换语法进行转换
        $v1 = (int)"1"; //$v1是整数类型的1
        $v2 = (float)"1.23";    //浮点类型
        $v3 = (string)$v1;  //字符串"1"

运算符
    
    按参与运算的数据的个数来分类
        单目运算符
        双目运算符
        三元运算符
        
    按功能分类
        赋值运算符
            =
        算术运算符
            + - * / %
        连接运算符
            .
        自赋值运算符
            += -= *= /= %= .=
        自操作运算符
            ++ --
        比较运算符
            > >= < <= == != === !==
            ==,=== 松散比较与严格比较(类型也要相等)
            1 == “1” 正确
            
        逻辑运算符
            && || !
            注意短路规则，把简单运算放在前面，提升运算效率            
        条件运算符
            数据1?数据2：数据3
        位运算符
            & |  ~
            位运算符 只针对 二进制运算
            0 & 1 = 0
            0 & 0 = 0
            1 & 0 = 0
            1 & 1 = 1
            
            ~0 = 1 
            ~1 = 0
            
            $n = g6 & 8;
            $m = 6 | 8;
            
            整数的其他位运算
                按位左移 <<,    将该数乘以2的n次方, 
                    $v1 = 8<<2; //8 * 2^2 = 32
                按位右移
                    
        其他
            @,是错误抑制符
                在一个表达式出现错误的时候，可以将错误隐藏起来(不输出)
                if( @mysqli_connect('localhost','root','123') )
                {echo "连接成功";}
                else
                {echo "连接失败，请重试";}
                将语法错误掩盖，避免用户看到暴露的错误信息
                
                
            (),括号，用于提升运算优先级

## 流程控制

顺序结构
    
    自上而下，依次执行
    
分支结构
    
    if 语句
        if ... 
        elseif ...
        else ...
    
    switch 分支语句
        switch(...)
        {
            case 值1：
                分支语句；
                break;
            case 值2：
                分支语句；
                break;
            default:
                默认分支；
        }
        
循环结构
    
    while 循环语句
        while(条件)
        {
            循环体；
        }
        
    do while 循环语句
        do
        {
            循环体；
        }while(条件判断)
    
    for 循环
        for($n=1;$n<100;$n++)
        {
            循环体；
        }
    
    循环的中断
        continue
        break

## 函数

函数基本内容

    使用范围
    <?php
        function test(){
            echo "函数";
            
            return;
        }
        
        test();
    ?>
    
    <div>
        <p>函数调用</p>
        <?php
            test();
        ?>
    </div>
    
    形参 - 实参
    参数作用范围
    函数参数作用范围限于函数空间
    
    默认值参数
        function f($n,$n2,$n3=1,$n4=2)
        {}
        注意参数顺序
    
可变函数
    
    函数名是一个变量的情形
    
    可变变量    $$v1
    可变函数    
        function f1(){...}
        $f = "f1";
        $f();   //调用了函数f1，这就是可变函数
        
        
        #可变函数
        function do_jpg($f)
        {
            echo "<br>处理jpg图片。。。";
        }
        function do_gif($f)
        {
            echo "<br>处理gif图片。。。";
        }
        function do_png($f)
        {
            echo "<br>处理png图片。。。";
        }
        $file = $_GET['filename'];//用户上传的文件名，比如123.jpg
        //haystack：干草堆，neele:缝衣针
        //strrchr() 用于在一个字符串haystack中找出指定的某个字符串needle出现的最后位置往后的所有字符
        //$houzhui = strrchr(haystack,needle)
        $houzhui = strrchr($file,'.');//得到类似这样：“.gif"
        
        //substr($v1,位置p，[长度n]);取出字符串v1中从位置p开始之后的n个字符
        $houzhui = substr($houzhui,i);//得到类似 jpg
        $func_name = "do_".$houzhui;    //构建出可以使用的函数名
        $func_name($file);
    
匿名函数

        一个定义时没有名字的函数
        $f1 = function(形参，，){...};
        $f1(实参);
    
常用系统函数
    
    跟函数有关的函数
    function_exits("函数名"); 判断一个函数是否存在
    func_get_arg($n);   在函数内部可用，用于获得第n个实参(n从0开始算起)
    func_get_args();    在函数内部可用，用于获得所有实参，结果是一个数组
    func_num_args();    在函数内部可用，用于获得实参的个数
    
    字符串有关常用函数
    输出与格式化：echo,print,printf,print_r,var_dump
    字符串去除与填充：trim,ltrim,rtrim,str_pad
    字符串连接与分割：implode,join,explode,str,split
    字符串截取：substr,strchr,substr_replace
    字符串长度与位置：strlen,strpos,strrpos
    字符串转换：strtolower,strtoupper,lcfirst,ucfirst,ucwords
    特殊字符处理：nl2br,addslashes,htmlspecialchars,htmlspecialchars_decode
    
    数学函数
    max     取得若干个数据中的最大值
    min     取得若干个数据中的最小值
    round   对某个数据进行四舍五入（可设定保留几位小数）
    ceil    对某个数向上取整
    floor   对某个数向下取整
    abs     绝对值
    sqrt    开平方
    pow     幂运算
    rand    获得某两个数之间的随机整数(含该两个数)
    mt_rand 获得某两个数之间的随机整数(含该两个数)，比rand块
    
    常用时间函数
    time        获得当前时间(精确到秒)，从1970年1月1日0:0:0开始
    microtime   获得当前时间，精确到微秒
                microtime(true)
                microtime(false)
                
    mktime      创建一个时间数据，参数为时，分，秒，月，日，年
                $t1 = mktime(10,8,5,7,12,2019)
    date        将一个时间转换为某种字符串形式
                date("Y-m-d H:i:s");
    idate       取得一个时间的某个的单项数据值，比如idate("Y")取得年份数
    strtotime   将一个字符串转换为时间值
    date_default_timezone_set   在代码中设置时区
    date_default_timezone_get   在代码中获取时区
    
函数相关
    
    变量作用域问题
    
        局部作用域--局部变量
            静态变量--一个特殊的局部变量,不会在函数调用结束时被销毁，下次调用时，还能使用
            function f()
            {
                static $s1 = 10;
            }
        
        全局作用域--全局变量
        
        超全局作用域--超全局变量
            只有有限的10来个系统预定义变量是超全局变量，包括
            $_GET,$_POST,$_REQUEST,$_SERVER
            
            一个特别的超全局变量 $GLOBALS
                是一个数组，其中存储了我们自己定义的所有全局变量
                每个全局变量的变量名，就是$GLOBALS数组的一个单元
                
                $v1 = 10; //全局变量
                function f()
                {
                    echo $GLOBALS['V1'];    //输出10
                    echo $v1;   //报错，变量未定义
                }
                
            一个特别的关键字 global
                用于在局部作用域中，修饰一个跟全局变量同名的局部变量
                此时该局部变量也可以使用全局变量的值了
                    --实际上他们其实是类似变量应用关系
                
                $n1 = 1;
                function f()
                {
                    //其含义是：定义一个局部变量$n1
                    //并且，该变量跟全局的$n1同名，并处于引用关系
                    global $n1;
                    echo "在函数中：n1= ".$n1;
                    $n1++;
                }
                f();
                echo "现在n1的值为：".$n1;
                
            $GLOBALS 数组(变量)和global关键字，都能实现在局部作用域中使用全局变量
    
递归函数
    
    函数调用函数本身
        function f($n)
        {
            if($n < 5)
                echo $n;
                f($n--)
            else
                return;
        }        
        f(10);
        
    树形文件存储结构
    
## 文件加载
    
    将一个文件包含到当前文件中，成为当前文件运行过程中的一部分
    公共代码 -> 独立文件 ->多页面使用
    
    include “要载入的文件路径” 可以使相对路径，也可以是本地物理路径
    
    文件加载的四种方式
        include '要加载的文件' 若载入失败，在报错后终止继续;
        include_once '要加载的文件' 若载入失败，在报错后终止继续;
        require    '要加载的文件'，若载入失败，在报错后终止程序;
        require_once    '要加载的文件' 若载入失败，在报错后终止程序;
      
        获取物理路径的方式
            __DIR__ 表示当前文件所在路径
            getcwd()    表示当前正访问的网页路径
                这两个会因为include 包含文件而略有不同
            
            echo "当前路径：".__DIR__;
            $file = __DIR__."\8include_test.html";
            echo "想要载入的文件为：".$file;
            include $file;
            
            $file2 = getcwd() . "\8include_test.html";
            echo "又想要载入的文件为：".$file2;
            
## 错误处理
    
错误分类
    
    语法错误
    运行时错误
    逻辑错误

常见错误代号  
    
    E_NOTICE:
        提示性错误，轻微
        错误发生后，后面程序继续执行
    E_WARNING:
        警告性错误，稍微严重；
        错误发生后，后面的程序继续执行
    E_ERROR:
        严重错误/致命错误
        错误发生后，后面你的程序不能执行
    E_PARSE:
        语法错误(语法解析错误)           
        语法解释错误，不能运行程序
    E_USER_NOTICE:
        用户自定义的提示错误
    E_USER_WARNING:
        用户自定义的警告错误
    E_USER_ERROR:
        用户自定义的严重错误
    E_ALL:
        是一个代表“所有”错误的代号
        
    这些错误代号是系统预先设定的一些常量，也就是预定义常量
    这些设置在 php.ini 中可以找到
        error_reporting = E_ALL 可以找到所有错误

错误触发
    
    两种情形触发错误
        程序本身有错，运行时就会触发错误
        程序本身无措，但出现不符合预计的情形(比如数据不符合要求)
            此时，我们可以主动创建一个错误，也就是用户错误
        
    自定义触发错误语法：
        trigger_error("自定义错误提示内容"，自定义错误的代号)

错误显示设置
    
    如果有错误发生，默认情况下会被显示在页面
    
    可自行对该情况进行设置
        1，设置display_errors以决定是否显示错误
            在php.ini中设置，display_errors=On或Off
                在这里设置，影响所有使用该php语言引擎的代码(网站页面)
            在php文件中设置， ini_set('display_errors',1或0);1表示显示，0不显示
                在这里设置，只影响当前网页代码本身
        2，设置error_reporting以决定显示那些错误
            在php.ini中设置：error_reporting=错误代号1|错误代号2...
                要下是就写出来 E_ALL 表示显示所有类型错误
            在代php文件汇中，道理类似：ini_set('error_resporting',错误代号1|错误代号2)

错误日志设置
    
    如果触发错误，默认情况下不会将错误信息记录下来
    1，设置 log_errors以决定是否记录错误
        php.ini 中设置：log_errors = On 或 Off
        代码文件中设置，ini_set('log_errors',1或0)
    2，设置error_log以决定记录到哪里
        通常，就设置为一个文件名 ，php系统会在网站的每个文件夹下都建立该文件并记录错误
        php.ini 中，error_log = error.txt; //它是纯文本的
        代码中：ini_set('error_log','error.txt');
        
        #演示错误日志的记录
        #设置需要去记录的错误信息
        ini_set("log_errors",1);
        
        #设置记录错误信息的文件
        ini_set("error_log",'./error_log.txt');
        
        echo $v1;
        echo "<h3>111</h3>";
        
        include '.10no_this_file.php';
        echo "<h3>222</h3>";
        
        $n2 = raund(2.6);
        echo "<h3>333</h3>"; 
        
# day3 Notes

## 错误处理

自定义错误处理
    
    自行定义错误处理
    两步：
        1，声明错误发生时，由自己处理--设定一个错误处理的函数名
        2，定义该函数，在函数中详细设定错误的处理情况，如何显示，显示什么，怎么记录，记录什么
        
        //自定义处理错误，分两步
        //1，声明，我们自己使用自己的函数来处理错误
        //set_error_handler("处理错误的自己的函数名")
        set_error_handler("my_error_handler");
        //2,定义该函数
        function my_error_handler($errCode,$errMsg,$errFile,$errLine)
        //参数解释  错误代号，错误信息，错误文件，错误行数
        //此形参顺序固定，而且是有系统会调用该函数并传入实参数据
        {
            //此函数中我们就可以去自己显示有关错误信息和记录信息
            $str = "<h1>大事不好了，发生错误了，快来人啊</h1>";
            $str .= "<br>发生时间：".date('Y-m-d H:i:s');
            $str .= "<br>错误代号：".$errCode;
            $str .= "<br>错误信息：".$errMsg;
            $str .= "<br>错误文件：".$errFile;
            $str .= "<br>错误行号：".$errLine;
            $str .="</p>";
            echo "$str";
        
            //记录错误--错误日志,FILE_APPEND 在原有文件上记性追加
            file_put_contents("./error.html",$str,FILE_APPEND);
        
        }
        
        //先输出几个出错的代码
        echo "<br>v1 = $v1";    //  未定义的变量       
        include './no_this_file.php';   //载入失败        
        function I1(){}        
        I1();   //调用不存在的函数

## 字符串详解

四种不同形式的字符串
    
    单引号字符串 $s1 = '字符串内容'
        里面不能包含其他单引号，要使用转义符,\\ 反斜杠，\'单引号
        $str = 'boy\'s apple phone is lost';
        
    双引号字符串
        $s1 = "字符串内容";
        丰富的转义符  
        \\      
        \"      
        \n      换行符
        \r      回车符
        \t      tab符
        \$      $本身
        
        $符号能识别变量，{$变量名}，{$数组['下标']}
    
    heredoc 字符串
        形式：$s1=<<<"标识符" 内容  标识符;
        
            $str =<<<"AAA"
            这里开始写字符串的内容，
            可以写很多行，通常这种字符串用于很多行的字符串形式
            比如可以写一大段html，css或js代码。。
            <input type="text" name = "username">
            AAA;
        
        标识符结束的哪一行，只能出现标识符紧挨着的分号，任何其他字符都不可以出现
        
    nowdoc 字符串
        形式：$s1=<<<'标识符'
    
字符串长度问题
    
    1字节(B)就是8个bit位(最小的存储空间)，1KB = 1024B
    求php字符串的长度，有两个函数
        strlen(字符串)：
            求该字符串的“字节数”，也就是占据的字节空间大小
        mb_strlen(字符串):
            求该字符串的"字符个数"
            在 php.ini 中，开启多字节处理函数
                extension = php_mbstring.dll
            $str = 'abc'
            echo mb_strlen($str);
            echo mb_strlen($str,"gbk");
    
    一个因为字符，占一个字节
    1个中文gbk字符，占2个字节
    1个中文utf8字符，占3个字节

常用字符串函数
    
    字符串输出
    echo    输出一个或多个字符
    print   输出一个字符串
    print_r 输出变量的较为详细的信息
    var_dump    输出变量的完整信息
    
    字符串去除与填充
    trim    消除一个字符串两端的空白字符或指定字符(空白字符包括：空格，\n,\r,\t)
        $str1 = "  abc  ";
        print trim($str1);//"abc"
    ltrim   消除一个字符串左边的空白字符或指定字符
    rtrim   消除        右边
    str_pad 将一个字符串使用指定的字符填充到指定的长度
    
    字符串连接与分割
    implode 将一个数组的值连接起来组成一个字符串
    join    同implode
            $str = ['ab','c','d'];
            $str2 = implode('-',$str);//ab-c-d
    explode 将一个字符串使用指定的字符分割为一个数组
            $str = "ab-c-d";
            $str2 = explode('-',$str);//['ab','c','d']
    str_split   将一个字符串按指定的长度分割为一个数组
    
    字符串截取
    substr  获取一个字符串中指定位置开始指定长度的字符串
    strstr  获取一个字符串中某个指定字符首次出现的位置起，到最后结尾处的字符
            strstr('abcd 12.txt','.'); //结果：".txt"
    
    字符串替换
    str_replace 将一个字符串中的指定字符，替换为给定的新字符
    substr_replace  将一个字符串中指定位置开始的指定个数的字符，替换为给定的新字符
    
    字符串长度与位置
    strlen  获取字符串的字节长度
    strpos  获取一个字符串中某个子字符串首次出现的位置
            strpos('abc123','c');//2
    strrpos 获取一个字符串中某个子字符串最后一次出现的位置
            strrpos('abcc123','c');//3
    
    字符转换
    strtolower  将一个字符串转换为小写
    stroupper   将一个字符串转换为大写
    lcfirst     将一个字符串的首字母转换为小写
    
    特殊字符处理：
    nl2br   将换行符转换为"<br/>"标签字符
    addslashes  将一个字符串中的以下几个字符串使用反斜杠进行转义:\ ' "
    htmlspecialchars    将html中的特殊字符换换为html实体字符如：
                (& ' " < >)-->(&ammp &apos &quot &lt &gt)
    htmlspecialchars_decode 将html实体字符，转换回原本的字符
    
    案例：
        取出如下若干个文件中的图片文件
        $files = array('abc.gif','123.txt','dirl/gift.PNG'.'FILE.jpg')
        
        $len = count($files);
        for($i=0;$i<$len;$i++)
        {
            $houzhui = strrchr($files[$i],'.'); //.gif .png
            $houzhui = substr($houzhui,1);  //gif png
            $houzhui = strtolower($houzhui);
            if($houzhui=="png" || $houzhui=="jpg" || $houzhui=="gif")
            {
                echo "<br>".$files[$i];
            }
        }

## 数组

数组的三种形式
    
    
    $a1 = [5,12,true,'abc'];
    $a1 = array(5,12,true,'abc');
    $a3 = ['a'=>1,'b'=>2];
    $a4 = array(
        'host'=>'localhost',
        'db'=>'test',
        'user'=>'root',
        'pass'=>'123',
        );
    
    $a5['name'] = "孙悟空";

数组下标问题
    
    下标可以使用整数或字符串
    
    整数下标的特性
        每一个没有使用下标的单元，系统给其分配的下标为之前所用过的
        整数下标的最大值+1,从0开始
        
        $a1 = array('a',2=>b,'c','x'=>'d','e');//下标分别为：0,2,3,x,4
        $a2 = array(5=>'a',2=>'b','c','x'=>'d');//下标分别为：5,2,6,x
        $a3['x'] = 5;//下标 0
        
索引数组
    
    $a = [4,2,5,6];//从0开始的下标

关联数组
    
    通常是指一个数组的下标都是字符串
    $person=array(
        'name'=>'张三',
        'age'=>'16',
    )
    类似于python 中的字典

多维数组
    
    一维数组
        $a = array(1.34,5);
        
    二维数组
        $a = array(
                array(1,34,8),
                array(3,5,6),
                ...
                )
        
        $a2 = [
                [1,2,3],
                [4,5,6],
                [7,8,9],    
            ]
    三维数组  
    
    不整齐数组

数组的遍历
    
    foreach 遍历数组
        $a = ['a'=>5,'b'=>12,'5'=>true,3=>'abc'];
        foreach($a as $value)
        {
            echo "<br>$value";
        }
        
        foreach($a as $ $key => value)
        {
            echo "<br>$key : $value";
        }
    
    for 循环遍历数组
        每一个数组都有一个指针，指向数组的某个单元，起初指向第一个单元
        
        针对数组指针进行相应操作的函数
        $re = current($a);  //取得数组中当前指针所在单元值
        $re = key($a);      //取得数组中当前指针所在单元的键
        $re = next($a);     //指针后移一个位置，并取值
        $re = prec($a);     //  前移
        $re = end($a);      //    移动最后一个位置，并取值
        $re = reset($a);    //        最前
        
        对于下标不是数字的情况，通过foreach 和 指针移动都可以完成数组求和

常用数组函数
    
    max()   获取一个数组的最大值
    min()   获取一个数组中的最小值
    count() 获取一个数组的元素个数
    in_array()  判断一个数据是否在指定数组中
            $b= in_array($数组,数据);//结果true/false
    range() 生成某个范围的连续值的数组，比如range(3,9)
            会得到会得到数组array(3,4,56,7,8,9)
    array_keys()    取出一个数组中所有键并放入一个索引数组中
    array_values()  取出一个数组中所有值并放入一个索引数组
    array_push()    将一个或多个数据放入一个数组的“末端”
    array_pop()     将一个数组的最后一个单元删除，并返回该单元的值
    array_reverse() 将一个数组的所有单元的顺序进行反转

常用数组排序函数
    
    sort，ksort,asort    由低到高，注意是否保留键值，及排序参照规则
    rsort,arsort        由高到低
    
排序算法
    
    冒泡排序
        每次循环找到一个最大值，是稳定排序(两个相等数的前后位置在排序排序前后不改变)
    选择排序
        每次找出最大值与最后一个位置上的数据交换位置
        “最后一个位置” 每次前进1
        
数组查找算法
    
    遍历查找
    
    二分查找

## 数据库

数据库介绍
    
    关系型数据库：基于关系模型而设计的数据库系统
    E-R 实体-关系图
    
访问mysql数据库
    
    mysql服务
        计算机服务可以开启，关闭
        
        cmd 命令行可以开启，关闭
            net start mysql
            net stop mysql
    
    连接数据库
        
        cmd 命令行：mysql -uroot -p
        
        navicat 软件连接数据库
        
        phpmyadmin  “网站”连接数据库
            安装(配置)该站点
            1，hosts 文件中设定域名解析：www.phpmyadmin7.com   
            2，拷贝网站文件到指定目录：
            3，httpd-bhosts.conf 文件中设置站点
                <VirtualHost *:5001>
                    ...
                <VirtulHost>
    
数据库操作
    
    create database 数据库名;
    show databases;
    drop database 数据库名;
    
    alter database 数据库名 .. ..;
    use 数据库名
    
数据表操作
    
    create table 表名称(id int(10),name char(20));
    show create table 表名();   
    show tables;
    desc 表名;
    drop table 表名;
    
    //添加字段
    alter table 表名 add 字段名 字段类型 [字段属性。] [after某字段名或first]
        alter table 'test' add salary float;    //放在最后
        alter table 'test' add edu varchar(20) after salary;    //放在最后
    
    //修改字段
    alter table 表名 change 旧字段名 新字段名 字段类型 [字段属性]
        alter table test change salary gongzi int default 0;
    //修改字段其他信息
    alter table 表名 modify 要修改的字段名 字段类型 [字段属性]
        alter table table1 modify edu varchar(10) after gongzi;
        
    
    
    //删除字段
    alter table 表名 drop 要删除的字段名;
    
    //修改表名
    alter table 表名 rename 新的表名;
    
    //修改字符集
    alter table 表名 charset=新的字符集;

    //插入数据
    insert into 表名 (字段名1，字段名2 。。) values (数据1，数据2.。)
    
    //查询数据
    select 字段名，。。 from 表名 [where 条件]
    select *from 表名
    
    //删除数据
    delete from 表名 [where 条件]; 可使用and
    
    //修改数据
    update 表名 set 字段名1=新值1，字段名2=新值2，。。 [where 条件]
        update info set content="新内容" where id=3;
    
    source 数据库文件物理地址
        
mysql 数据类型
    
    列类型
        
        数值型
            整数型
                tinyint
                smallint
                mediumint
                int
                bigint
                
            小数型
                浮点
                    float
                    double
                    
                定点
                    decimal
                    
        字符串型
            set
            enum
            blob
            text
            varchar
            char
            
            
        日期时间型
            year
            timestamp
            time
            date
            datetime
    auto_increment; 自增长
    primary_key 主键
            
        
        
        
    
        