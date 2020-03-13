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

# day4 Notes

## msyql

实体与实体的关系
    
    实体(Enity)
        一个表中的一行数据实际就是指对某物的描述性数据，所以一行数据
        就是一个实体，有时候实体也指整个表
    实体间关系(relationship)
        是指不同实体数据之间的关系，很多时候就是指表和表之间的关系
        一对一关系，一对多关系，多对多关系
        
高级查询
    
    select 子句
        [from 子句]
        [where 子句]      //过滤条件
        [group by 子句]   //分组
        [having 子句]     //对中间结果进一步筛选
        [order by 子句]   //排序
        [limit 子句]      //限制结果数量
        ;

    
    select id as username from user;    //别名
    
    select distinct user_name,user_pass from user;//消除重复
    
    
    where 子句
        select id from user where id>3;
    
    mysql 运算符
        算术运算符
        比较运算符
        逻辑运算符
            && 或 and
            || 或 or
            !  或 not
        其他特殊运算符
            like 模糊查询
                xxx字段 like ‘%关键字%’
                
                % 表示任意个数的任意字符
                ‘_’(下杠) 表示‘任意一个字符’
                
                select *from product where pro_name like '%电视机%'
                select *from user where name like '罗%'; //罗。。。。。
                select *from user where name like '罗_'; //罗+任意一个字符

            between 范围限定运算符
                用于判断某个字段的值是否在给定的两个数据范围之间
                    xxx字段 between 值1 and 值2
                含义：相当于 xxx字段>=值1 and xxx字段<= 值2
                select *from product where price between 5000 and 10000;

                
                
            in 运算符
                用于判断某个字段的值是否在给出的若干个‘可选值’范围
                    xxx字段 in （值1，值2.。。）
                含义：该字段的值相当于所列出的任意一个值，就算满足条件
                    籍贯 in (‘北京’，‘山东‘);//某人籍贯满足上述一个条件就行
                select *from product where chandi in('北京’，’上海‘);
                select *from product where chandi='北京‘ or chandi=’上海‘;
                
                
                
            is 运算符
                用于判断一个字段中的是“是否存在”，只有两个写法：
                    where content is null;  //不能写成 content=null
                    where content is not null;  //不能写成 content！=null
                select *from shunxing where f4 is null;
    
    group by 语句
        分组本身的字段信息
            select *from product group by pingpai;//对其按品牌进行分组
        
        一组的综合统计信息，主要包括：
            计数值: count(字段)，表示求出一组中原始数据的行数
            最大值: max(字段)，表示求出一组中该字段的最大值
            最小值: min(字段)，                   小
            平均值: avg(字段)，                   平均值
            总和值: sum(字段)，                   累加和
            
            这5个函数被称为聚合函数
            
            查询出各个品牌的产品平均价
            select pingpai,avg(price) from product group by pinpai;
            
            查询出各个产地的产品数量，平均价，最高价，最低价
            select chandi,count(*) as 数量,avg(price) as 平均价,max(price)
                as 最高价,min(price),sum(price) as 价格之和 from ’product' group by chandi;
            
            查询出产品表中联想品牌的产品总数
            select count(*) as 总数 from product where pinpai='联想';
            
            多条件分组
            将product表中的所有商品以品牌和产地进行分组，并求出每一组的数量
            select pinpai,chandi,count(*) as 数量 from product group by pinpai,chandi;
            
    having 子句
        having 筛选条件
        是用于对group by 分组的结果进行的条件筛选
        
        查询出品牌平均价超过5000的所有品牌的平均价，最高价，以及产品的数量
        select pinpai,avg(price) as 平均价,max(price) as 最高价,count(*) as 数量
            from ’product' group by pinpai having avg(price)>5000;
    
    order by 子句
        对钱所取得的数据按给定的字段进行排序
        排序方式有:正序 asc,倒序 desc，默认是 asc
        
        对所有产品按价格从高到低进行排序
        select *from product order by price desc;
        
        对所有品牌的平均价从高到低的顺序进行排序，并列出品牌名和平均价
        select pinpai,avg(price) as 平均价 from product group by pinpai order by 平均价 desc;
        
    limit 子句
        
        limit 起始行号，行数
        
        表示对前面所取得的数据进行数量上的筛选，取得从某行开始的多少行
        
        取出商品表中价格最高的3个商品，并按倒序排列出来
        select *from product order by price desc limit 0,3;

高级插入
    
    同时插入多行记录
        insert into 表名(字段1，字段2.。) values (值1，值2.。),(值1，值2.。).;
    
    插入查询的结果数据
        insert into 表名(字段1，字段2.。) select (xx1,xx2...).. ;
        
    set语法插入数据
        insert into user set username='bao',pass='123';
        
    蠕虫复制
        针对一个表的数据，进行快速的赋值并插入到所需要的表中
        以期在短时间内具备大量数据，以用于测试或其他特殊场合，比如：
            1，将一个表的大量数据，复制到另一个表中
            2，将一个表的数据复制到本身表中以产生大量数据
            
            insert into user3a (user_name,user_pass) select user_name,
                user_pass,edu from user3;
    
    主键冲突解决办法
        1，忽略    --终止插入，数据不改变
            insert ignore into 表名（字段..） values(值..);
        2，替换    --删除原纪录，插入新纪录
            replace into into 表名(字段。。) values (值..)
        3，更新    --设置为去更新原有数据(而并不插入)
            insert into 表名(字段) values (值..) on duplicate key update xx字段=新的值
            
高级删除

    按指定顺序删除指定数量的数据
        delete form 表名 where .. [order by 字段名..] [limit 数量n];
        
    trancate 清空
        trancate 表名;
        表示清空指定表中的所有数据并将表恢复到初始化状态；

高级更新
    
    update set 字段名1=字段值1. where .. [order by 字段名..] [limit 数量n];

    update user set age=22 order by id desc limit 2;

联合(union)查询
    
    联合查询概念
        指将2个或2个以上的字段数量相同的查询结果，“纵向堆叠”后合并成一个结果;
    
    select id,f1,f2 from join1
    union   [all 或 distinct]
    select id2,c1,c2 from join2
    
    [order by 字段 [asc 或 desc]]
    [limit 起始行号，数量]

连接(join)查询
    
    将两个查询的结果以横向对接的方式合并起来的结果
    select .. from 表1 [连接方式] join 表2 [on 连接条件] where ..;
    
    假设 表1 有 n1 行, m1 列
        表2 有 n2 行, m2 列
        
        则表1 和表2 ‘连接’ 之后，就会有
            n1 * n2 行；
            m1+m2 列；
            
            select *from join1,join join2;
            
    交叉连接(cross join)
        from 表1 [cross] join 表2
        
        交叉连接 称为 笛卡尔积
        执行所有连接
        
    
    内连接(inner join)
        from 表1 [inner] join 表2 on 连接条件
        
        在交叉连接的基础上，通过on条件而筛选出来的部分数据
        
        找出所有价格大于5000的家用电器的商品的完整信息(含所属类别)
        select *from product as p inner join product_type as t
            on p.protype_id = t.protyp_id
            where price>5000 and protype_name='家用电器';
        
    外连接
        
        左外连接
            from 表1 left [outer] join 表2 on 连接条件
            保证左边表的数据都能取出的一种连接
            在内连接的基础上加上 左边表中所有不能满足条件的数据
            
            select *from join1 left join join2 on join.f1 = join.c1
            
            
        右外连接
            from 表1 right [outer] join 表2 on 连接条件
            和 左外连接正好相反
            
            找出所有类别及各类别中的商品(需列出类别名称，商品名称，价格，品牌和产地)
            select protype_name,pro_name,price,pinpai,chandi
                from product_type as t left join product as p
                    on p.protype_id = t.protype_id;
    
    自连接
        自己跟自己连接
        
        from 表名 as  a [连接形式] join 表名 as b on a.xx 字段1 = b.xx字段名
        select a.area_name,b.area_name from area as a join area as b on a.parent_id=b.id;
        
        找出所有省份及其下属城市：
        select province.area_name,city.area_name
            from area as province join area as city on province.id = city.parent_id;
    
    子查询
        
        一个正常查询语句的某个部分(比如select部分，from部分，where部分)  
            又出现了一种查询形式
            
            select *from xx表名 where price>=(一个子查询语句)
            
            其实就是 select语句的嵌套查询
            select *from product where>(select avg(price) from product);
            
        标量子查询
            标量子查询的结果，可以直接当一个值来使用
            
            找出产品表中价格大于北京产地的产品平均价的所有产品
            select *from product where price>(
                select avg(price) from product where chandi='北京'
            )
            
        列子查询
            列子查询查出的结果为一列数据，类似
                select pinpai from product where chandi='背景'
                结果为一列数据
            
            列子查询通常用在where子句的in运算符中，代替in运算符中的字面值列表数据
        
            
        行子查询
            行子查询出的结果通常是一行
            select pinpai from product where price=11499;
            
            行子查询的结果通常是跟 行构造符 一起，在where子句中作为
            条件数据，类似
                where (字段1，字段2) = (行子查询)
            或
                where row(字段1，字段2) = (行子查询);
            
            找出跟单价最高的商品同品牌同产地的所有商品
            select *from product where row(pinpai,chandi) =(
                select pinpai,chandi from product where price =(
                    select max(price) from product;
                )
            )
            
        表子查询
            当一个子查询查出的结果是 "多行多列" 的时候，就是表子查询
            查询的结果相当于一个表，可以直接当做一个表来使用
            
        
        有关子查询的语句
             in 关键字
                在子查询中主要用在列子查询中
                
                找出联想品牌的商品都有哪些类别
                select *from product_type where protype_id in(
                    select distinct protype_id from product where pinpai='联想'
                )
                
                            
             any 关键字
                any 关键字用在比较操作符的后面，表示查询结果的多个数据中的任一个满足
                该比较符就算满足
                
                找出在北京生产的但价格比在深圳生产的任一商品贵的商品
                select* from product where chandi='北京' and price>any(
                    select price from product where chandi='深圳';
                )
                           
             all 关键字
                select* from product where chandi='北京' and price>all(
                    select price from product where chandi='深圳';
                )
    
             exists子查询
                where exists(任何子查询)
    
                该子查询如果 有数据，则该exists() 的结果为true，即相当于 while true
                
数据管理
    
    数据备份
        备份整个数据库
        mysqldump.exe -h 主机地址 -u 用户名 -p 密码 数据库名 > 备份文件名(含路径)
        
        该语句是mysql/bin 中的一个命令，不是sql语句，所以不是登录后使用
        
        备份单个表
        mysqldump.exe -h 主机地址 -u 用户名 -p 密码 数据库名 表名 > 备份文件名(含路径)
                               
        
    数据还原
        mysql.exe -h 主机地址 -u 用户名 -p 密码 目标数据库名 < 想要还原的备份文件名(含路径)
    
        
用户管理
    
    用户管理
        用户账号的管理：创建，删除，改密
        用户权限的管理：授予权限，取消权限
    
    查看用户
        use mysql;
        select *from user;
               
    创建用户
        create user '用户名' [@'允许登录的地址'] identified by ‘密码’；
        
        ‘允许登录的地址’就是允许登录的客户端的ip地址
            1，‘localhost’ 表示只能本地登录
            2，'%'表示任何位置都可以登录
            3，该部分可以省略，如果省略，默认就是‘%’；
            4，后续涉及到用户的操作，都是这个格式
            
        create user 'user1' identified by '123';
        create user 'user2'@'localhost' identified;
        create user 'user3'@'192.168.1.103' identified;
        
    删除用户
        drop user 用户[@'允许登录的地址'];
    
    修改/设置用户
        set password for 用户[@'允许登录的地址'] = password('密码')
    
    授予用户权限
        grant 操作1，操作2.。。 on *.* 或 数据库名 或数据库名 表名 to 用户[@'允许登录的地址']
        
    取消用户授权
        revoke 操作1，操作2.。。 on *.* 或 数据库名 或数据库名 表名 to 用户[@'允许登录的地址']
## day5 Notes

PHP 连接MySQL 服务器 
    
    1,mysqli_connect()
        连接到mysql数据库
        mysqli_connect(host,username,password,dbname,port)
        如果连接成功，则返回mysqli 连接对象，如果失败，则返回false;
        
            $my = @mysqli_connect("localhost","root","123456","h");        
            if ( $my )
                {
                    echo 'connect success!';
                }
            else
                {
                    echo 'connect fail!';
                }
            mysqli_close($my);
    2,@ 运算符
        php 支持一个错误控制运算符 @，放在表达式前，若表达式出错，则错误信息
        被忽略，不会显示在页面中
        相对来说，对用户体验和安全性有很好的作用
        
    3，exit() 或 die()
        die() 终止程序向下执行   

        exit() 输出一个消息并退出当前脚本，等同于 die()
               输出 $string 的值，并终止程序的运行
               无返回值
    
    4,mysqli_connect_error()
        描述：返回上一个mysql连接产生的文本错误信息
    
    5,mysqli_close()
        关闭先前打开的数据库连接,不再占用连接通道
        $my = @mysqli_connect("localhost","root","123456","h");        
        mysqli_close($my);
    
    6,当前数据库
        选择特定的数据库进行操作
        bool mysqli_select_db(mysqli $link,string $database)
        如果成功返回 true，失败返回false；
        
        if(!mysqli_select_db($my,$db_name))
        {
            echo "<br> 选择数据库{$db_name}失败";
            die();
        }
        else
        {
            echo "<br>连接数据库成功";
        }
        
        
    7,设置客户端字符集    
        设置默认字符编码
        bool mysql_set_charset(mysqli $link,string $charset)
        如果成功返回 true，失败返回false；

执行各种SQL语句
    
    1,mysqli_query()
        发送一条mysql查询
        resource mysqli_query(mysql $link,string $query)
        $query  查询字符串,这个查询语句是广义的sql语句，可以是 selcet，update等语句
        $link   是创建的活动的数据库连接
        
        mysqli_query仅对select,show 或 describe 语句返回一个
        mysqli_result 结果集对象
        如果查询执行不正确返回false，执行成功时返回true
    
    2,mysqli_free_result()
        释放与结果及相关联的内存
        void mysqli_free_result(mysqli_result $result)
        $result 为结果集对象
        
        内存中的变量何时消失
            1，网页执行完毕，所有与本网页相关的变量自动销毁
            2，手动销毁指定的变量

从结果集获取一行数据
    
    1，mysqli_fetch_row()
        从结果集中取得一行数据作为枚举数组,若无数据返回false
        array mysqli_fetch_row(mysqli_result $result)
        
        从指定的结果表示关联的结果集中取得一行数据并作为数组返回，每个结果的列
        存储在一个数组的单元中，偏移量从0开始
        
        依次调用 mysqli_fetch_row()将返回结果集中的下一行，如果没有更多行
        则返回false；
        
    2,mysqli_fetch_assoc()
        从结果集中取得一行作为关联数组,无更多行则返回 FALSE
        array mysqli_fetch_assoc(mysqli_result $result)
        
        此函数返回的字段名大小写敏感
    
    3,mysqli_fetch_array()
        从结果集中取得一行作为关联数组或数字数组或二者都有,无更多行返回FALSE
        array mysqli_fetch_array(mysqli_result $result [int $result_type=MYSQLI_BOTH]
        )
        $result_type    常量，取值
        MYSQLI_BOTH     两者兼有，默认
        MYSQLI_ASSOC    关联索引
        MYSQLI_NUM      数字索引
    
    4,mysqli_fetch_all()
        从结果集中取得所有行作为关联数组，枚举数组，或二者兼有
        mixed mysqli_fetch_all(mysqli_result,[int $result_type=MYSQLI_NUM])

获取记录数
    
    1，mysqli_num_rows()
        取得结果集中行的数目
        int mysqli_num_rows(mysqli_result $result)
        此命令仅对select语句有效
    
    2，mysqli_affected_rows();
        取得一次MySQL操作所影响的记录行数
        int mysql_affected_rows(mysql $link)
        取得最近一次与$link关联的select,insert,update,delete查询所影响的记录行数
        
        如果最近一次查询失败，函数返回-1。当使用update查询,MySQL不会将原值
        和新值一样的值更新，返回值不一定就是查询条件所符合的记录，
        只有修改过的记录数才会被返回
        
学生信息管理系统
    
    1，创建数据库表 student，填充数据信息
    2，创建html table 表结构
    3，创建公共 conn.php文件
        require_once("./conn.php"); //文件仅包含一次
        #require(); //文件包含的情况下调用该函数会继续包含，重载
    
    4，学生信息列表页 list.php
    5，删除学生信息 delete.php  
    6，添加学生信息 add.php
        表单提交
        token 令牌：是一个唯一随机值，永不重复，服务器一份，表单一份
                    表单发过来的与服务器进行比较
        <input type="hidden" name="token" value="随机值">

PHP处理复选框数据

        给复选框每项内容的 name="...[]"，里加上 [] ；当数组处理
        
        PHP会把name='hobby[]'看成添加一个数组元素，而html把他看成一个字符串
        <form action="" method="post">
            爱好
            <input type="checkbox" name="hobby[]" value="画画">画画
            <input type="checkbox" name="hobby[]" value="音乐">音乐
            <input type="checkbox" name="hobby[]" value="电脑">电脑
            <input type="checkbox" name="hobby[]" value="游戏">游戏
            <input type="checkbox" name="hobby[]" value="开车">开车
            <input type="submit" value="提交">
            <input type="hidden" name="token" value="add">
        </form>
        
        将多个爱好连城一个值，并写入到数据库某个字段中，只需要一个字段来存储爱好
                
## day6 Notes

### PHP 操作目录

    1,目录操作概述
    
    2,创建新目录 mkdir()
        新建一个由pathname指定的目录，创建成功方式ture,否则为false
        bool mkdir(string $pathname,[int $mode=0777,[bool $recursive=false]])
          
        $pathname:指定目录的路径
        $mode:默认mode是0777，意味着最大可能的访问权，$mode在windows下被忽略，$mode的值为八进制
        $recursive:如果指定的路径的上级目录不存在，则也会递归创建
        
        $dirname = "./static";
        mkdir($dirname,0777,true);
        
    
    3,判断是否是一个目录is_dir()
        判断给定文件名是否是一个目录
        bool is_dir(string $filename);
        如果文件名存在且是个目录，返回true，否则返回false
        
    4,判断目录或文件是否存在file_exists()
        bool file_exists(string $filename)
        可以判断文件和目录是否存在，是则返回true，否则返回false
        
    5，删除目录rmdir()
        删除目录：该目录必须是空的，否则会报错
        rmdir($dirname);
    
    6，更改目录的访问权限chmod()
        改变文件的访问权限
        bool chmod(string $filename,int $mode)
        $filename:指定文件的路径
        $mode：mode参数包含三个八进制数按顺序分别指定所有者，所有者所在的组
                    以及所有人的访问限制。每一部分都可以通过加入所需的权限
                    来计算出所要的权限
                    数字1：文件可执行
                    数字2：文件可写
                    数字4：文件可读
        文件只读权限：0444
        文件夹只读权限：0555
    
    7，取得目录或文件访问权限fileperms()
        int fileperms(string $filename)
        以十进制数组返回文件的访问权限
    
    8，重命名或移动文件或目录rename()
        重命名或移动一个文件或目录，如果文件不存在同一目录下就是移动
        bool rename(string $filename,string $newname)
    
    9，打开目录 opendir()
        打开目录句柄，可用于之后的closedir(),readdir(),rewinddir()调用中
        
        resource opendir(string $path)
        如果成功则返回目录句柄的resource，失败则返回FALSE
        
        $handle = opendir($dirname);    
    
    10，读取目录中条目readdir()
        从目录句柄中读取条目
        string readdir([resource $dir_handle])
        返回目录中下一个文件的文件名，文件名以在文件系统中的排序返回
       
    11，显示中文目录或文件iconv()
        字符串按要求的字符编码来转换
        string iconv(string $in_charset,string $out_charset,string $str)
        
        $in_charset:输入的字符集
        $out_charset:输出的字符集
        $str:要转换的字符串
        
        返回：返回转换后的字符串，或者在失败是返回false
        
    12，关闭目录句柄 closedir()
        关闭由dir_handle指定的目录流，流必须之间被opendir()锁打开
        void closedir([resource $dir_handle)
        
        提示：如果省略$dir_handle,则默认为最后由opendir()打开的目录句柄
        节省服务器资源
### 综合实例：递归遍历phpMyAdmin下的所有条目
    
    1，递归思想
        把一个相对复杂的问题转化为一个与原问题相似的规模较小的问题来解决
        
    2，递归实现的条件
        确定递归公式
        确定递归边界条件(递归出口)，否则会出现死循环

### PHP操作文件
    
    1，打开文件 fopen()
        打开文件或url
        resource fopen(string $filename,string $mode)
        $filename:要打开的文件
        $mode:打开的方式
        
        提示：为移植性考虑，在用fopen()打开文件时总是使用'b'标记
        返回值，成功时返回文件指针资源，如果打开失败，本函数返回false
    
    2，打开文件的方式
        mode            说明
        'r'             只读，将文件指向文件头
        'r+'            读写方式打开
        'w'             写入方式打开，将文件指针指向文件头并将文件大小截为零，若不存在，则创建
        'w+'            读写入方式打开，将文件指针指向文件头并将文件大小截为零，若不存在，则创建
        'a'             写入，文件指针指向文件末尾，若不存在，则创建
        'a+'            读写方式打开，文件指针指向文件末尾，若不存在，则创建
        'x'             只写，并创建文件，若文件已存在，则fopen()调用失败并返回false
        'x+'            读写，并创建文件，若文件已存在，则fopen()调用失败并返回false
    
    3，关闭文件 fclose()
    
    4，读取指定大小文件内容fread()
        读取文件(可安全用于二进制文件)
        string fread(resource $handle,int $length);
        $handle:由fopen() 创建的handle，$length最多读取的字节数
        提示：在区分二进制文件和文本文件的系统上(如 windows)打开文件时
                fopen() 函数的mode参数要加上'b'
        返回值：返回读取的字符串，或者在失败时返回false
    
    5，读取一行内容 fgets()
        从文件指针中读取一行
        string fgets(resource $handle,int $length)
        $handle:文件指针必须有效
        $length:从handle指向的文件中读取一行并返回长度最多为length-1字节的字符串
                碰到换行符(包括在返回值中）,EOF或读完定制
                
                若无指定长度，读取1k，1024字节
                
    6，读取文件内容到数组汇中file()
        把整个文件读入一个数组中
        array file(string $filename,[int $flags=0])
        
        $filename:文件路径
        $flags:附加选项
        FILE_USE_INCLUDE_PATH(1):在include_path中查找文件
        FILE_IGNORE_NEW_LINE(2):在数组的每个元素末尾不添加换行符
        FILE_SKIP_EMPTY_LINES(4):跳过空行
        
        注意：不需要打开和关闭文件
    
    7，读取文件内容到字符串中file_get_contents()
        建整个文件读入一个字符串
        string file_get_contents(stirng $filename)
        返回值：返回读取的数据，失败时返回false
        
    8，实例：读取记事本中的内容，并用表格展示出来
    
    9，写入文件
        int fwrite(resource $handle,string $string);
        返回：返回写入的字符数，出现错误时侧返回false
    
    10，将一个字符串写入文件
        和依次调用fopen(),fwrite()及fclose()功能一样
        int file_put_contents(string $filename,mixed $data,[int $flags=0])
        参数：
            $filename 要被写入数据的文件名
            $data   要写入的数据，类型可以使string,array(一维数组)
            $flags  附加选项
            FILE_USE_INCLUDE_PATH(1) 在include目录里搜索filename
            FILE_APPEND(8) 如果文件filename已经存在，追加数据而不是覆盖
            LOCK_EX(2)在写入时获得一个独占额
            
    11，拷贝文件
        将文件从source拷贝到dest
        bool copy(string $source,string $dest)
        如果目标文件存在，则会覆盖
    
    12，删除文件
        bool unlink(string $filename)
        可以删除虚拟空间之外的文件，但必须使用相对路径,必须有权限
        删除的文件不会进入回收站
    
    13，其他文件操作函数
        filesize()  可以获取文件大小，单位为字节
        is_writable()   判断文件是否可写
        is_readable()   判断文件是否可读
        feof()          判断文件指针是否到达文件结尾
        filectime()     获取创建文件的时间
        fileatime()     获取文件最新访问时间
        filemtime()     获取文件最后修改时间
        
### 综合实例：递归删除 day5 目录
        
### PHP数据分页

    1，创建连接数据库的公共文件 conn.php
    
    2，显示学生信息列表 list.php
    
    3，分页原理
    
    4，仿百度分页 
        每页显示条数：$pagesize
        总记录数：$records   mysqli_num_row()
        总页数：    $pages  ceil($records/$pagesize)
        开始行号    $startrow   开始行号
        
        分页语句：select *from student limit({$startrow},{$pagesize})
        推到开始行号$startrow ：（$page-1）*$pagesize

### HTTP协议概述
    
    1，B/S网络结构
        浏览器/服务器模式
        
        web浏览器  (http)  web服务器    (SQL)  数据库服务器
        
    2，HTTP协议概述
        超文本传输协议(HyperText Transfer Protocol)
        HTTP是一个客户端和服务器端请求和应答的标准
    
    3，HTTP协议的特点
        简单，快速：只需传送请求方法和路径
        灵活  ：HTTP允许传输任意类型的数据对象，正在传输的类型有ContentType进行标记
        无连接：每次连接只处理一个请求，请求结束后就断开，采用这种方式可以节省传输时间
        无状态：对于事务处理没有记忆能力，不存储本次请求意外的数据
                所以需要其他信息时，需要重传，导致数据传送的数据量增大
                另外，在不需要先前信息时，应答比较快
                
### HTTP协议 之 URL
    
    1，什么是url
        url-uniform resource locator:统一资源定位符
        格式：protocol://hostname[:port]/directory/filename?name=value#anchor
        举例：http://www.itcast.cn/include/news.php?p=5#top
    
    2，url各部分含义
        
        protocol    浏览器使用的协议：http,https,ftp,file等
        hostname    服务器主机名称
        port        端口号
        directory   指定访问的资源目录名称
        filename    指定访问的资源名称
        ?name=value 指定访问资源时，附带的参数部分
        #anchor     指定访问资源时的锚点名称(网页的不同部分)

### HTTP 协议之请求
    
    1，http请求的构成
        三部分：请求行，请求头，请求正文
    
    2，HTTP请求行的格式
        格式：Method Request-URI HTTP-Version
        参数
            Method：请求方法，必须大写
            Request-URI：统一资源标识符(URI)
            HTTP-Version:表示请求的HTTP协议版本，HTTP/1.0短连接，HTTP/1.1场链接
                        长连接：数据传输完成，保持连接通道不断开，等待同域名下继续使用钙通道传输数据
    
    3，HTTP请求头含义
        报头名称            含义
        User-Agent      用户代理，允许客户端将他的操作系统，浏览器和其他属性告诉服务器
        Host            用户指定被请求资源的主机和端口号，它通常从HTTP URL中提取出来的
        Accept          用于指定客户端接收哪些类型的信息，如image/gif,text/html,*/*(所有类型)
        Accept-Language 指定客户端可以接受到语言类型
        Accept-Encoding 指定可接受的内容压缩编码类型
        Accept-Charset  用于指定客户端接收的字符集
        Cookie          写到服务器端的COOKIE数据
        Connection      连接类型，keep-alive(保持激活，短时间不断开，一般为30s)，Close(立即断开)
        Cache-Control   控制缓存，no-cache(不缓存)
        Refer           可以记录访问的来源，统计访问量，可以用来作防盗链
    
    4，HTTP请求正文
        GET方式：无消息体，数据附在url之后传递到服务器
        POST方式：有消息体，数据放在消息体中传递到服务器
        消息体和消息头之间有一空行，不能省略
        
    5，下面的代码需要，http需要发送几次请求
        test.php文件内容入下
        <h1>北京传值博客教育</h1>
        <p><img src="a.jpg"></p>
        <p><img src="b.jpg"></p>
        
        img link script frame   都是自动向服务器发送请求
        
### HTTP协议之响应
    
    1，响应的构成
        三部分：状态行，响应头，响应正文
    
    2，HTTP状态行的格式
        格式：HTTP-Vsersion Status-Code Reason-Phrase
        参数：
            HTTP-Vsersion   表示服务器HTTP协议的版本
            Status-Code     表示服务器发回的响应状态代码
            Reason-Phrase   表示状态代码的文本描述
        
    3，HTTP响应状态码：
        状态代码有三位数字组成，第一个数字定义了响应的类别，且有五种可能的取值
        1xx:指示信息-表示请求已接收，继续处理
        2xx:成功-表示请求已被成功接收、理解，接受
        3xx:重定向-要瓦城请求必须进行跟进一步的操作
        4xx:客户端错误-请求有语法错误后请求无法实现
        5xx:服务器端错误-服务器未能实现合法的请求
        
        常见HTTP响应状态码含义
        状态码      含义
        200        OK，请求已成功
        302        请求的资源临时从不同的URL响应请求，由于这样的重定向是临时的
                    客户端应当继续向原有地址发送以后的请求
        304         Not Modified 文档的内容(自上次访问以来或者根据请求的条件)并没有改变
        400         Bad Request 语义有误，当前请求无法被服务器理解
        401         Unauthorized 当前请求需要用户验证
        403         Forbidden 服务器收到请求，但是拒绝提供此服务
        404         Not Found   请求资源不存在
        408         Request Timeout 请求超时
        500         Internal Server Error 服务器发生不可预知的错误
        503         Server Unavaliable 服务器当前不能处理客户端的请求，一段时间后可能恢复正常
        
    4,302状态码演示
        301 永久重定向，更改服务器配置，重启服务器，由旧域名转成新域名 
        302 临时重定向，不需要服务器配置，直接在PHP中修改，不是重大改变用302
        
        //header函数：告诉浏览器如何做，浏览器收到这个临时跳转命令，会向新的地址发送请求
        header("location:./delete.php");//302状态码
    
    5,304状态码演示
        304的含义：文件内容没有修改，不需要从服务器下载数据，直接从缓存读取
        
        echo "<img src='./images/img1.jpg'>";
    
    6,403状态码演示
        含义:请求接受，但无权访问
        对apache服务器设置的虚拟站点进行权限更改，在无权访问的情况下会报403的错误
    
    7,404状态码演示
    
    8，HTTP响应头含义
        一个HTTP响应代表服务器给浏览器回送的数据，同时告诉浏览器应当怎样处理数据
        响应报头名称          含义
        Date            告诉浏览器，请求页面的时间
        Server          服务器软件信息
        Content-length  回送数据的字节数
        Content-Type    回送内容的类型
        Expires         表示存在时间，允许客户端在这个时间之前不去检查(发请求),
                        等同max-age的效果。但是如果同时存在，则被Cache-Control
                        的max-age覆盖
        Pragma          缓存控制
        Cache-Control   缓存控制
        X-Powered-By    版权信息
        Keep-Alive      连接类型
        Location        响应报头域用于重定向到一个新的位置
        Refresh         页面刷新时间
        Last-modified   指定服务器上保存的最后修订时间
    
    9，刷新并跳转
        等待3s并跳转
        header("refresh:3;url=./delete.php")
    
### 抓包工具
    
    HTTPWatch抓包工具使用
        HTTPWatch 网页数据分析工具
    
### 综合案例：实现视频文件下载
    
    1,下载的静态页面download.html
    2，下载成需处理download.php

## day7 Notes

### 图像处理概述

    1，开启GD2图像扩展库
        PHP不仅限于只产生HTML的输出，还可以创建与操作多种不同格式的图像文件
        PHP提供了一些内置的图像处理函数，也可以使用GD函数库创建新图像，或处理已有的图像
        目前GD2库支持JPEG,PNG和WBMP格式
        
        GD扩展用于动态创建图片，使用c语言编写
        
        开启GD2扩展库，将php.ini中extension=php_gd2.dll选项前的分号去掉，重启
    
    2，查看图像扩展库GD2是否开启
        phpinfo();
        使用图像处理函数
    
    3，创建图像的大致步骤
        1，创建画布
        2，绘制图形
        3，输出图像
        4，释放资源
    
    4，画布坐标系说明
        坐标原点位于画布左上角，以像素为单位
        
### 创建图像和销毁图像
    
    1，创建基于已有图像的图像 imagecreatefrompng()
        描述：由文件或URL创建一个新图像
        语法：resource imagecreatefrompng(string $filename)
        参数：$filename 为图像的完整路径
        返回：成功后返回图像资源，失败后返回false
        提示：imagecreatefromjpeg()和imagecreatefromgif()语法与该函数相同
        
    
    2，创建空画布图像 imagecreatetruecolor()
        描述：新建一个真彩色图像，支持24位色，RGB(256,256,256)
        语法：resource imagecreatetruecolor(int $width,int $height)
        参数：$width 图像宽度，$height 图像高度
        返回：成功后返回图像资源，失败后返回false
        
    3，销毁图像资源 imagedestroy()
        描述：销毁一图像，释放与image图像标识符关联的内存
        语法：bool imagedestroy(resource $image)
        参数：$image 为由imagecreatetruecolor()创建的图像标识符

### 图像操作
    
    1，为图像分配颜色imagecolorallocate()
        语法：int imagecolorallocate(resource $image,int $red,int $green,int $blue)
        参数：$image 图像资源表示符
        提示：第一次对imagecolorallocate()的调用会给图像填充背景色
        
    2，输出图像到浏览器或保存文件imageijpeg()
        描述：以jpg/gif/png格式将图像输出到浏览器或文件
        语法：bool imagejpeg(resource $image,[string $filename,[int $quality]])
        参数：quality为可选项，范围从0到100，默认的质量值(大约75)
        提示：imagegif(),imagepng()与imagejpeg()格式一样，但没有第三个参数
    
    3，水平地画一行字符串 imagestring()
        描述：水平地画一行字符串
        语法：bool imagestring(resource $img,int $font,int $y)
        参数：
            $img:图像资源
            $font:字体大小，取值1,2,3,4,5，使用内置字体
            $x,$y绘制字符串的开始坐标，一般在字符串左下角
            $y 代表要绘制的一行字符串
            $col 代表文本颜色
            $s  代表一行字符串
            
    4，获取画布的宽度和高度
        宽度：int imagesx(resource $image);
        高度：int imagesy(resource $image);
        
    5，获取内置字体的宽度和高度
        描述：返回指定字体一个字符宽度或高度的像素值
        字体宽度：int imagefontwidth(int $font)
        字体高度：int imagefontheight(int $font)
        提示：$font 为字体大小，取值1-5，最大为5
        

        
    6，实例：在图像上绘制一行居中的字符
    
    7，画一矩形并填充
        bool imagefilledractangle(resource $image,$x1,$y1,$x2,$y2,$color)
        参数：
            $x1,$y1 左上角图标
            $x2,$y2 右上角图标
            $color 填充背景颜色
            
    8，画一个单一像素
        bool imagesetpixel($image,$x,$y,$color)
        说明：
            imagesetpixel()在image图像中用clor颜色在x,y坐标(图像左上角0,0)上画一个点
       
    9，往图像上写入一行汉子
        描述：用TrueType字体系那个图像写入文本
        语法：array imagettftext($image,$size,$angle,$x,$y,$color,$fontfile,$ext)
        参数：
            $size:字号大小，自定义同word字号一样
            $angle:旋转角度(0-360)
            $x和$y:定义第一个字符的基本点
            $fontfile:是想要使用的TrueType字体的绝对路径
            $text:UTF-8编码的文本字符串
            
### 实例：图像验证码
    
    
    
    1，绘制图像验证码
    
    2，产生一个指定范围的数组 range()
        描述：建立一个包含指定范围单元的数组
        语法：array range(mixed $start,mixed $limit,number $step=1)
        参数：
            $start 指定范围第1个值
            $limit 指定范围最后一个值
            $step  指定步长值
    
    3，合并数组 array_merge()
        描述：合并一个数组
        语法：array array_merge($array1,$array2...)
    
    4，从数组中随机取出一个或多个单元
        描述：从数组中随机取出一个或多个单元
        语法： array_rand($input,[int $num_req=1])
        参数：
            input 表示当前数组
            $num_req指明了你想取出多少单元
    
    5，生成更好的随机数
        int mt_rand(int $min,int $max)
        参数：
            min 可选的，返回的最小值，默认0
            max 可选的，返回的最大值，默认0

### 实例：制作图像水印效果
    
    描述：为图像分配透明颜色imagecolorallocatealpha()
    语法：int imagecolorallocatealpha($image,$red,$green,$blue,$alpha)     
    说明：imagecolorallocatealpha()的行为和imagecolorallocate()相同，但多了一个额外的
        透明度参数alpha,其值从0到127,0表示完全不透明，127表示完全透明

### 实例：生成图像缩略图
    
    描述：将一幅图像中的正方形区域拷贝到另一个图像中，平滑地插入像素值，一次，减少了图像的大小
        而仍然保持了极大的清晰度
    
    语法：bool imagecopyresampled($dst_img,$src_image,$dst_x,$dst_y,$src_x,$src_y,$dst_w,$dst_h,$src_w,$src_h)
    参数： 
        $dst_image:目标图像
        $src_image:源像图
        $dst_x和$dst_y:目标图像x,y坐标
        $src_x和$src_y:原图像x,y坐标
        $dst_w和$dst_h:目标图像的宽度和高度
        $src_w,$src_h:源图像的宽度和高度        
        
## day8 Notes

### 文件上传
    
    1，文件上传原理
        就是文件从浏览器端传到服务器端
        必须使用<form>标记来向服务器端发数据
        <form>标记的method属性值必须是POST
        <form>标记的ENCTYPE属性值必须是multipart/form-data;
        必须使用<input type='file' name='upload'>标记实现
       
        
    2，超全局变量数组$_FILES
        $_POST 数组中保存的是普通表单元素数据
        $_FILES 数组中保存的是上传文件的信息
        
    3，上传文件错误代码
        0   没有错误发生，文件上传成功
        1   上传的文件超过了PHP.ini中upload_max_filesize选项限制的值
        2   上传文件的大小超过了html表单中MAX_FILE_SIZE选项指定的值
        3   文件只有一部分被上传
        4   没有文件被上传、
        6   找不到临时文件
        7   文件写入失败
    
    4，查看上传的临时文件
        上传文件的默认临时目录，如果没有指定php.ini配置项upload_tmp_dir的值
        ，则使用操作系统临时目(c:\window\temp),通过phpinfo()函数查看
        
        临时文件是短暂存在的，也就是在脚本执行完毕后就消失了
    
    5，将上传文件移动到新位置
        描述：本函数检查并确保有filename指定的文件是合法的上传文件，(通过PHP的HTTP POST上传机制上传的)
            如果文件合法，则将其移动到有destination指定的文件，最好在临时文件没有消失前移动
        
        语法：bool move_upload_file($filename,$destination)
        参数：
            $filename:指定上传的临时文件名
            $destination:指定新的文件名路径
        
        如果文件已存在，则会覆盖操作
    
    6，上传文件的相关配置(php.ini)
        upload_max_filesize 配置：上传单个文件的大小限制，默认 2MB
        post_max_size配置：规定上传多个文件的总大小，默认为8MB
        max_file_uploads配置：规定最多上传的文件个数，默认为20个
    
    7，获取文件路径信息pathinfo()
        返回文件路径信息
        mixed pathinfo($path,int $options=PATHINFO_DIRNAME|PATHINFO_BASENAME|)
        $path   要解析的路径
        $options    如果省略返回全部单元
        PATHINFO_DIRNAME    目录名称
        PATHINFO_BASENAME   文件名称
        PATHINFO_EXTENSION 扩展名
        PATH_FILENAME   文件名
    
    8，检查数组中是否存在某个值 in_array()
        in_array(mixed $needle,array $arr)
        $needle:检索的值
        $arr:原数组
    
    9，生成唯一ID uniqid()
        string uniqid([string $perfix=""],bool $more_entropy=false)
        $prefix 前缀字符串，如果省略，返回字符串长度为13
        $more_entropy 后缀字符集，如果省略，返回字符串长度为23
        
    
### 实例：单个文件上传
    
    1,上传表单制作 upload.html
    
    2,上传文件的程序处理 upload.php

### 实例：多个文件上传
    
    在对name属性的命名上，采用 uploadfile[] 方式，来造成数组进行处理
    
    1,制作上传表单
    <form action="upload.php" name="form1" method="post" enctype="multipart/form-data">
    
        上传图片1：<input type="file" name="uploadfile[]"><br>
        上传图片2：<input type="file" name="uploadfile[]"><br>
        上传图片3：<input type="file" name="uploadfile[]"><br>
    
        <input type="submit" value="提交">
        <input type="hidden" name="token" value="upload">
        
    </form>
    
    2，上传多个文件的程序处理
    //判断表单是否是合法操作
    if(isset($_POST['token']) && $_POST['token']=='upload')
    {
    /*
        1,判断上传文件有没有错误发生
        2，判断上传文件是否超过2mb大小
        3，判断上传文件是不是图片
        4，移动临时文件到虚拟目录中：取出文件扩展名，文件名唯一性
    */
    
        //1,判断上传文件有没有错误发生
        if ($_FILES['uploadfile']['error'] != 0)
        {
            echo "<h2>上传文件发生了错误</h2>";
            die();
        }
    
        //2，判断上传文件是否超过2mb大小
        if ($_FILES['uploadfile']['size']>2*1024*1024)
        {
            echo "<h2>文件大小超出php.ini中的限制</h2>";
            die();
        }
    
        //3，判断上传文件是不是图片
        $arr = array('image/jpeg','image/png','image/gif');
        $type = $_FILES['uploadfile']['type'];
        if (!in_array($type,$arr))
        {
            echo "<h2>必须上传图像</h2>";
            die();
        }
    
        //4，移动临时文件到虚拟目录中：取出文件扩展名，文件名唯一性
        $ext = pathinfo($_FILES['uploadfile']['name'],PATHINFO_EXTENSION);//jpg
        $tmp_name = $_FILES['uploadfile']['tmp_name'];
        $dst_name = "../upload/".uniqid().".".$ext;
        move_uploaded_file($tmp_name,$dst_name);
        echo "<h2>文件上传成功</h2>";
        die();
    
    }
    else
    {
        echo "非法操作";
    }
    
## COOKIE

### COOKIE概述

    1，什么是COOKIE
        COOKIE 就是服务器暂时存放在你的电脑里的资料(.txt格式的文本文件)，好让服务器辨认你的计算机
        
        cookie是由服务器段生成，发送给user_agent(一般是浏览器),浏览器会将cookie的key/value保存
        到某个目录的文本文件内，下次请求同一网站时就发送改cookie给服务器
        
       
        
    2,IE浏览器查看COOKIE数据 
        工具栏菜单>>internet选项>>常规选项卡>>浏览器历史记录>>设置>>查看文件
    
    3，使用cookie的好处
        存放必要性信息
        
        跟踪统计用户访问网站的习惯，什么时间访问，访问了哪些页面，页面停留时间等
            为用户提供个性化服务，为网站营销提供参考
    
    4，cookie的工作原理
        我的电脑(客户端)               百度网(服务器段)
        写入相应的                                       
        cookie数据       http请求->     向浏览器发送存储cookie指令
                    
                    <-http应签(第一次)指令
                        存储cookie
        cookie数据
        name=admin
        pass = 123456                
                        
        读取cookie数据    http请求->            
        并发送到服务器     携带cookie数据      获取并验证浏览器发送的cookie数据
                    
                    <-http响应(第二次)
                    
### COOKIE操作
    
    1，添加cookie数据
        向客户端发送一个http cookie
        bool setcookie($name,$value,$expire=0,$path,$domain,$secure=false,$httponly=false)
        
        $name:cookie的名称
        $value:cookie的值
        $expire:cookie的有效期
        $path:cookie的服务器路径
        $secure:规定是否通过安全的https连接来传输cookie
        
        设置成功返回true
        
    2，读取cookie数据
        获取cookie数据是通过超全局数组$_COOKIE来实现的
        value = $_COOKIE[key];

### COOKIE设置

    1,cookie过期有效性设置
        1，即时性cookie设置
            默认cookie的有效期时关闭浏览器时自动失效，
            bool setcookie($name,$value,$expire=0)
            $expire 指定cookie保存的时间,默认为0，关闭浏览器失效
        
        2，有效性cookie设置
            bool setcookie($name,$value,$expire)
            $expire为一个时间戳，一般用time()+N表实新的时间戳，在当前时间点
                    再加上N秒，产生一个新的时间戳
                
            持久性cookie
            
    2，cookie路径有效性
        设置cookie只能在指定的目录及其子目录下有效
        bool setcookie($name,$value,$expire=0,$path)
        
        访问不同的页面，携带针对性的cookie
        
    3，cookie域名有效性
        给一个cookie指定访问的域名
        setcookie($name,$value,$expire,$path,$domain)
        
        提示：默认情况下，cookie只能在当前域名下有效
    
    4，是否仅htps安全连接才能发送cookie
       bool setcookie($name,$value,$expire=0,$path,$domain,$secure=false)

    
    5，是否只能通过http协议来使用cookie
        客户端的cookie除了可以通过http之外，还可以使用js来使用cookie
        bool setcookie($name,$value,$expire=0,$path,$domain,$secure=false,$httponly=false)

### 删除cookie数据
    
    1，设置cookie有效性为过去的某个一时间
        setcookie($name,$value,expire);       
        setcookie("username","admin",time()-1)
        
    2,设置cookie的值为false 或空字符串
        setcookie($name,false)
        setcookie($name,"")
        
    3，不设置cookie 的值
    
    4,清理浏览器缓存

### cookie总结
    
    不安全
    容量小，大约4kb
    数据类型只能是字符串
    浏览器可禁用cookie

## SESSION          

### SESSION概述
    
    1，什么是session
        session 对象存储特定用户的会话数据
        session 将会话数据存储在服务器端
        session 是基于cookie 技术的
        session 在整个用户的会话中，一直存在下去
        一个用户会话时效，从用户登录开始，到用户登录结束
        session 存储的数据量要比cookie大得多
        session 存储的内容类型，不限于字符串
        session 数据存储在服务器端，更安全更可靠
    
    2，session的工作原理
        
        浏览器端                服务器段
        
                http请求->    php脚本引擎
                                
                                session
        cookie数据区             会话数据区
        session标识符<-http响应   session-id
        phpsessionid=...        session数据
    
    3,开启session会话功能
        启动新会话或者重用现有会话
        bool session_start(void)
        提示：$_SESSION 变量默认是不存在的，与$_POST,$_GET,$_FILE不同
            必须先开启session会话，才能使用$_SESSION变量
        
            每个需要session数据的页面，都要开启SESSION功能
        注意：SESSION功能，不能重复开启，(同一个页面不能开两次)
        返回：成功开始会话返回TRUE，反之返回FALSE
        
        提示：session文件的保存位置：c:\window\temp
        
### session 操作
    
    1，添加session数据
        $_SESSION[key]=value
        
        一个网站不管添加多少个SESSION数据，最终在浏览器只存储一个SESSION的ID值
        该ID值是经过加密的，并且永不重复key只能是string类型的数据
        
        session 文件在服务器端的存储位置：c:\window\temp
    
    2,读取SESSION数据   
        $value = $_SESSION[key]
        提示：每次SESSION操作，都要先开启SESSION功能
    
    3，删除SESSION数据
        使用unset()函数，删除一个SESSION数据
    
    4，销毁SESSION文件
        删除当前的session文件，不影响其他的session文件
        bool session_destroy(void)
        
### SESSION对应COOKIE的配置

     1，SESSION 对应COOKIE过期时间设置
        修改php.ini配置项，session_cookie_lifetime        
        
     2，SESSION对应COOKIE有效路径设置
        修改php.ini配置项，session.cookie_path
        
     3，SESSION对应COOKIE域名有效性设置
        修改php.ini配置项：session.cookie_domain
        
     4，是否仅限https来发送SESSION对应的COOKIE数据
        修改php.ini配置项：session.cookie_secure
        
     5，是否仅限http来使用SESSION对应的COOKIE数据
        修改php.ini配置项：session.cookie_httponly
        
### SESSION垃圾回收机制
    
    1，什么是SESSION的垃圾回收机制
        SESSION垃圾回收，就是将过期的SESSION服务器文件删除的机制
        SESSION会自动删除那些过期的服务器端session数据区文件
    
        修改php的配置文件php.ini
    
    2，垃圾回收的周期：session.gc_maxlifetime
        在php.ini中的值 默认是 1440s，也就是24分钟
        没24分钟，清理一次session垃圾文件
        
    3，垃圾回收的概率：session.gc_divisor
    
        回收概率：分子/分母得到一个百分比，达到100%就清理，
                1/1000，每1000人访问，才会清理一次
                
        回收周期和回收概率混合使用
            先看有没有达到24分钟，然后查看访问人数是否满足要求
            若满足，则清理
            
### 相册管理
    
1，准备工作
        
        准备相册，字体文件，html页面
        
2，创建数据库和数据表
        
        创建数据库
            create database php_albummangement;
            
        创建用户数据表user
            create table user(
                id int not bull auto_increment primary key,
                username varchar(20),
                password char(32)
            )
            
        
        添加一条用户数据
            对密码使用 md5 加密
            insert into user(username,password) value('admin','e10adc3949ba59abbe56e057f20f883e');
        
        创建相册数据表 photos
            create table photos(
                id int not null auto_increment primary key,
                title varchar(20),
                imgsrc varchar(100),
                intro text,
                hits int not null default 0,
                addate int(10)
            )
        
        
3，用户登录
    
    1，登录表单页面 login.php
        服务器处理表单数据
            判断表单是否合法提交
            获取表单提交数据
            判断验证码与服务器是否一致
            判断账号与数据库保存是否一致
            将用户信息存储到SESSION中
            跳转到相册首页
        
        
    2,登录程序处理页面 loginSave.php
    
    3,连接数据库公共文件 conn.php
    
    4,创建验证码页面captcha.php
    
    5，登录页面添加验证码
    
4，添加照片
    
    1，制作添加相册的表单 upload.php
    
    2,表单处理程序 uploadSave.php

    3，finfo应用
        根据内容判断文件类型
        开启应用    
            extension=curl
            extension=fileinfo
    
5，显示照片详细信息
    
    1，首页文件 index.php

显示照片列表
    
    1，读取照片数据 index.php
    
    2,数据分页
## day9 Notes

### 面向过程编程
    
    面向过程编程思想，以过程为中心，逐步解决问题
    
### 面向对象编程

    面向对象编程思想，以事物为中心，以功能划分问题
    

类和对象的关系
    
    1，类的概念
        类是具有相同属性(特征)和行为的一组对象的集合，它为属于该类的全部对象提供了
        统一的抽象描述，其内部包括属性和行为两个部分
        
    2，对象的概念
        对象时构成系统的基本单位，任何一个对象都应该具有以下两个要素：
            属性(attribute)+行为(behavior)

类的定义
    
    1，类的定义语法格式
        类和函数一样，都可以看成代码的封装方式
        

类的成员属性定义  
    
    1，成员属性介绍
        类的成员属性：某个类具有的公共的特征，特性
        类中定义的变量：类的成员属性，有权限修饰符进行权限限制
        
    2，权限修饰符
        public (公共权限)
        private(私有权限):只能在本类中访问
        protected(受保护的权限):只能在本类和子类中访问


类的成员方法定义
        
    1，成员方法介绍
        类的方法：某个类的公共的行为或动作，默认权限public
        
创建类的实例
    
    1，实例化对象的含义
        对象实例化：从一个类上来生产对象，就是累的实例化
    
    2，语法格式
        new 关键字
        JS创建对象的方法：var today = new Date();
        PHP创建对象的方法：$obj = new Student();

对象属性操作
    
    1，如何访问对象的属性和方法
        js：访问对象的属性和方法是通过"."来访问的。window.alert()
        PHP:访问对象的属性和方法是通过"->"来访问的。$obj->name
        
        属性前不加$符号，不然会变成变量
        
    2,对象属性的操作
        更改  $obj->age = 20;
        删除 unset($obj->age);

对象方法操作
    
    对象方法的操作：方法定义，方法调用，传递参数，方法返回值
    
        public function test($name,$age)
        {
            return "{$name}的年龄是{$age}";
            echo "{$name}---{$age}<br>";
        }
        var_dump($obj2->test('123',123));
        
        若没有return var_dump 为null,但是 echo 语句会输出
        若有return    echo语句不会输出
    
伪变量$this的使用
    
    1，伪变量$this的含义
        js中：使用this关键字来代替当前对象，例如：this.src="./a.jpg"
        php中，使用$this变量来代替当前对象，例如：$this->name="张三";
        $this代表当前对象，是到当前对象的一个引用
        $this更像是一个对象指针，指向当前对象
        $this只能在对象方法中定义，去调用对象的成员属性或成员方法
        只有创建对象后，$this变量才存在，类不会自动运行

类常量的定义
    
    1，类常量介绍
        可以把在类中始终不变的值定义为常量，例如圆周率，班级名称等
        常量的值必须是一个定值，不能修改，也不能删除
        类常量就是类的常量，是与类相关的，与对象无关
        类常量在内存中只有一份，不管创建多少个对象
        类常量可以极大节省服务器内存，可以被所有对象去共享
        
    2，类常量定义和调用格式
        类常量没有权限，只有属性和方法才会有权限
        使用const 来定义类的常量(局部常量),只能在局部作用域下使用，
        define()定义常量是全局常量，任何地方都可调用
        
        
构造方法
    
    1，什么是构造方法
        当使用new关键字创建对象时，第1个自动调用的方法，就是构造方法
        构造方法的名称是固定的，void_construct([mixed $args..])
        构造方法可以的带参数，也可以不带参数，构造方法不是必须的
        构造方法的作用，对象初始化
        构造方法一定是成员方法，构造方法的权限可以自己制定
        构造方法一般不需要主动调用，都是自动调用

析构方法
    
    1，什么是析构方法
        对象销毁前自动调用的方法，就是析构方法
        析构方法的名称也是固定的，void __destruct(void)
        析构方法不带任何参数
        析构方法一定是成员方法
        析构方法的作用：垃圾回收工作，清理内存，断开数据库连接，销毁画布资源
    
    2，对象何时销毁
        网页执行完毕时，对象会自动销毁
        使用unset()函数手动销毁对象
    
    3，实例：统计在线人数

静态属性和静态方法
    
    1，概述
        静态属性：static 关键字修饰的属性；类的属性，与类相关，与对象无关
        静态方法：static 关键字修饰的方法；类的方法，与类相关，与对象无关
        类的东西(类常量，静态属性，静态方法),通过类名::调用
        静态属性或静态方法，在内存中只有一份，被所有对象去共享
        静态属性或静态方法的好处：节省内存
        静态属性和类常量的区别：常量在一次HTTP请求过程值永远不变，但是静态属性可以改变
        静态属性和静态方法：都可以加权限控制符，而类常量没有权限
        静态属性和静态方法不需要实例化对象，就能使用
    
    2，定义格式
    
    3，self关键字使用
        $this 是指向当前对象的指针，而self是指向当前类的指针
        $this 关键字用来调用对象的属性和方法
        self 用来调用类常量，静态属性，静态方法
        $this 关键字只能在成员方法中使用，不能在静态方法中使用
        self 关键字可以在成员方法和静态方法中使用
    
综合案例：设计一个学生类
    
    要求：定义一个学生类，并由此类实例化两个 学生对象 。该类包括姓名，性别年龄
        等基本信息，至少包括一个静态属性，表示总学生数和一个常量，以及包括构造方法
        和析构方法该对象还可以调用一个方法来实现自我介绍(显示其中的所有属性)，
        构造方法可以自动初始化一个学生的基本信息，并显示“xx 加入班级，当前有xx个学生”
        
OOP中内存的分配情况
    
    1，为什么使用var_dump打印对象时，只能看到成员属性呢
        object(Student)#1 (3) {
          ["name":"Student":private]=&gt;
          string(6) "张七"
          ["sex":"Student":private]=&gt;
          string(3) "男"
          ["age":"Student":private]=&gt;
          int(18)
        }
        普通变量(整型，浮点型，bool值)放在栈内存
        对象和数组，成员属性放在堆内存
        函数和代码放在代码区
        静态的和常量的放在静态区
        
        var_dump打印的是堆内存
        
    2，OOP中内存的分配情况
        
        面向对象各部分内存分布         静态空间(区)
                                   const count = 1
                                   
        栈内存        堆内存空间       代码空间
        
        $obj1   ->  new Student()       public function show()
                    name属性，sex属性     {
                                            echo $this->name
                                       }
值传递和引用传递
                                   
    3,什么是值传递
        将一个变量的数据或值，复制一份，传递给另一个变量
        这两个变量之间没有任何关系，修改其中一个变量的值，另一个变量的值不受影响
        默认情况下，PHP值传递的数据类型有：字符串型，整型，浮点数，布尔型，数组型,NULL
        
        $a = 100;
        $b = $a;
        $a = 200;
        echo $a,$b;//200,100
        
        数组也是值传递
        
        值传递在内存中如何表现
            都具有独立空间
        
    4,什么是引用传递
        将一个变量的数据地址，复制一份，传递给另一个变量
        这两个变量指向同一个地址，修改其中一个变量的值，另一个也会受影响
        默认情况下：PHP引用传递的数据类型有：对象和资源
        
        class Student{
            public $age = 20;
        }     
        $s1 = new Student();
        $s2 = $s1;
        $s1->age = 10;
        print_r($s1)    //[age] => 10
        print_r($s2)    //[age] => 10
        
        对于海量数据，使用 引用传地址，要比传值 快的多
    
    5，其他类型变量使用引用传递
        如果其他类型变量使用引用传递，只需要在引用的变量前加 & 符号即可
        
        $arr1 = ['10010','张三',20];
        $school1 = "清华大学";
        
        function addElement(&$arr2,$school2)
        {
            $arr2[] = $school2;
            print_r($arr2)
        }
        addElement($arr1,$school1);
        print_r($arr1);//两个数组的内容相同

类的封装性
    
    1，什么是类的封装性
        类的三大特性：封装性，继承性，多态性
        封装性：将敏感的数据保护起来，不被外界访问，该可以理解为，将一个功能的方方面面
                封装成一个整体，即类：
                
        类的封装性，是通过访问权限修饰符来实现的
        提示：在项目中，属性基本都是私有的，通过公有的方法，对私有的属性
            进行赋值和取值
    
    2，访问权限修饰符介绍
        public (公共权限)
        private(私有权限):只能在本类中访问
        protected(受保护的权限):只能在本类和子类中访问

类的继承性
    
    1，什么是类的继承性？
        CSS样式继承，父标签定义的样式，子标签可以直接使用，减少代码量
        如果一个B类拥有了A类的所有特征信息，我们就说B类继承A类
        
        为什么使用类的继承：实现功能的升级和扩展
            功能升级：愿来有的功能，在子类中进行完善
            功能扩展：愿来没有的功能，在子类增加新功能
        
    2，继承的语法格式
        class SubClass extends ParentClass
        {
            //子类的内容定义
        }
        SubClass:要创建的子类名称
        extends:继承
        ParentClass:父类
    
    3,单继承和多继承
        单继承：只能从一个父类来继承功能，如java,php,c#
        多继承：同时从多个父类来继承功能，如 c++
    
    4,单继承的简单示例
    
    5,parent关键字
        self代表当前类，parent代表父类
        self和parent可以存在于所有方法(成员方法和静态方法)中
        self用来调用本类的内容，包括：类常量，静态属性、方法，成员方法
        parent用来调用父类的内容，包括：类常量，静态属性，成员方法
        self和parent都用范围解析符“::”来调用其他内容
        语法：parent::类常量|静态属性|静态方法|成员方法
        
        父类中有常量TITLE
        子类中有常量TITLE
        
        在子类中调用父类常量：parent::TITLE
        
类的多态
    
    1,什么是类的多态
        类的多态，就是类的多种形态
        类的多态主要指方法重载或方法重写
            方法重载：在同一个类中定义两个同名方法，参数或类型不同，PHP不支持
            方法重写：在子类中定义一个与父类同名的方法，就是重写
        为什么要重写方法:进行功能升级
    
    2，方法重写的要求
        子类中重写的方法，要与父类中的方法同名
        子类中重写的方法形参个数要与父类中同名方法形参个数一致
        子类中重写的方法类型，要与父类中同名方法类型一致
        子类中重写的方法的访问权限，不能低于父类中同名方法的访问权限
            父类方法权限为public,子类只能是public
                    protected       protected/public
                    private         子类无法继承，也无法重写
        
        注意：对于重写构造方法，就比较特殊，就没有形参个数的要求

    3，实例：商品子类重写商品基础类中的方法

最终类和最终方法
    
    1，概述
        Final关键字修饰的类，就是最终类
        Final关键字修饰的方法，就是最终方法
        最终类：该类只能实例化，不能被继承。该类已经十分完善了，不需要升级和扩展
        最终方法：该方法可以被继承，但不能重写，该方法不需重写
        
        final class Student{}
        class SmartStudent extends Student{}    //报错，无法继承
        
    2，实例：最终类和最终方法演示

抽象类和抽象方法
    
    1，概述
        abstract关键字修饰的类，就是抽象类
        abstract关键字修饰的方法，就是抽象方法
        抽象类：该类不能直接实例化，必须先继承后在实例化，常用在基础类
        抽象方法：方法必须先继承后重写
        抽象方法就是方法的命名规范，命名规则，也可以理解为一种监督机制
        所有的抽象方法都必须重写
        抽象方法没有方法体，必须在子类重写后，再定义方法体
        如果一类中有抽象方法，则该类必须是抽象类
        抽象方法权限不能是private，因为要先继承在重写
        在PHP7中，抽象方法可以是成员方法，也可以使静态方法
        抽象类中，可以包含其他成员，常量，成员属性成员方法，静态属性、方法
    
    2，实例：抽象类和抽象方法实例演示
    
接口技术
    
    1,接口的基本概念
        PHP类是单继承，也就是不支持多继承
        当一个类需要多个类的功能时，单继承就无能为力了，为此PHP引入了类的接口技术
        多人合作开发项目时，需要规范各个功能的名称，就需要用到接口技术了
        接口就是一种标准，一种规范。类的功能实现，按照标准接口实现即可
    
    2，接口定义和实现要点
        interface 关键字定义接口
        implements 关键字用来实现接口
        接口中方法权限必须是public
        接口种方法默认是抽象的，所以不需要在方法名前面加abstract
        接口中方法可以是成员方法，也可以是静态方法
        接口中也可以定义常量，但常量不能重写
        类可以实现(implements)多个接口(相当于多个功能于一身)
        接口也可以继承接口
    
    3，接口定义和实现演示
    
    4，实例：创建手机类并实现小灵通接口，MP3接口，MP4接口

类的自动加载
    
    PHP7以下版本,使用 __autoload()实现类的自动加载
    PHP7以上版本，使用 spl_autoload_register()实现类的自动加载
    
    1，为什么需要类的自动加载
        很多开发者写面向对象的应用程序时，对每个类的定义，都建立一个独立的PHP类文件
        方便类文件的统一管理，但是在脚本开头引入时，可能因为文件太多而写很长的
        包含文件列表，占用很多内存且不利于后期维护
        
        解决方案：俺需要加载类文件，而不是把素有类全部包含进来
    
    2，类文件的命名规范
        一个类要单独定义成一个独立的类文件
        类文件扩展名要以 .class.php 结尾，是一种约定
        类文件主名，要与类名一致
        
        例如：Db.class.php,UserController.class.php
    
    3,类的自定义加载函数：spl_autoload_register()
        1),spl_autoload_reigster()何时调用？
            当试图使用未定义的类时，该函数自动调用，使用一个类有以下几种情况
                使用new关键字创建不存在的类时    $obj=new Student()
                当使用静态化方式访问一个不存在的类：Student::show()
                当继承一个不存杂的类时：class stu extends Parent({}
                当实现一个不存在的接口时:class Stu implements inter;
                
        2),语法格式
            描述：将函数注册到SPL(标准PHP库)的__autoload函数队列中，如果该队列
                中的函数未激活，则激活它们，他实际上创建了autoload函数的队列
                按定义时的顺序逐个执行
            语法：bool spl_autoload_register([callback $autoload_function])
            参数：
                $autoload_function,欲注册的自动连载函数，可以是匿名函数，也可以是字符串的函数名称
                $autoload_function，有一个传递过来的类名形参，用于在函数中构建类文件路径
        
        3)使用普通函数作为参数
        
        4)使用匿名函数作为参数
## day10 Notes

### 面向对象

对象克隆
    
    1，什么是对象克隆
        在已有对象的基础上，创建一个新对象，并且两个对象的属性值不一样
        使用 clone关键字进行克隆
        
    2，实例：对象克隆的演示
    
    3,实例：魔术方法__clone()在克隆对象中的使用
    

对象遍历
    
    foreach 既可以遍历数组元素，也可以遍历对象属性
    
    foreach(数组或对象 as 下标或属性 => 数组元素值或对象属性值)
    {
        //输出结果数组元素的值，或对象属性的值
    }
    
常用魔术方法
    
    1，__toString()
        描述：将对象转成字符串时，__toString()会自动调用
        语法：public string __toString(void)
        注意：PHP不支持对象转字符串，因此，不能使用echo输出一个对象
        
    2，__invoke()
        描述：当把一个对象当成函数来调用时，__invoke()会自动调用
        语法：mixed__invoke([$..])

面向对象的设计模式
    
    1，什么是对象设计模式
        设计模式(design pattern)是一套被反复使用，多数人知晓，经过分类编目的
        代码设计经验的总结，使用设计模式是为了可重用代码，让代码更容易地被人理解，
        保证代码可靠性
    
    2，常用的设计模式有哪些
        单例设计模式：一个类只能创建一个实例对象，不管用什么方法都无法创建第2个对象
                    比如，数据库类
        工厂设计模式：生产不同类对象的工厂
        策略设计模式：定义一组算法，将每个算法都封装起来，并且使他们可以互相转换
        观察者设计模式：定义对象间一种一对多的依赖关系，使得每当一个对象改变状态
                    则所有依赖于它的对象都会得到通知并自动更新
    
    3，单例设计模式的要求(三私一公)
        一私：私有的静态的保存对象的属性
        一私：私有的构造方法，阻止类外new对象
        一私：私有的克隆方法，阻止类外clone对象
        一公：公共的静态的创建对象的方法
    
    4，实例：单例设计模式演示

总和案例：学生信息管理系统
    
    1，面向对象开发流程
        面向过程是以过程为中心的编程思想，面先对象是事务(对象)为中心的编程思想
        对象是专业对象，是一个功能方方面面的综合，例如：数据库对象，分页对象，图像处理等
        一个项目有若干个功能模块构成，包括：用户管理，新闻管理，产品管理，文章管理，学生管理等
        每个功能模块是一个对象：包括：用户对象，新闻对象，产品对象，文章对象，学生对象
        每个对象对应一个类：包括：用户类，新闻类，产品类，文章类，学生类
        当然，每个模块还有一些公共对象：数据库对象，分页对象，上传对象，图像处理，验证码对象等
    
    2,单例设计模式
    
    3，数据库工具类(Db.class.php)
    
    4，连接数据库的公共文件(conn.php)
    
    5,学生信息列表(./list.php)
    
    6,删除学生信息(./delete.php)
        删除函数 confirmDel(id)
        删除页面    delete.php
    
    7,创建分页类文件 ./Pager.class.php

工厂设计模式
    
    1，什么是工厂设计模式
        根据不同的类名参数，返回不同类的对象
        工厂模式，就是生产各种不同类的对象
        工厂模式：改变了在类外使用new关键字创建对象的方式，改成了在工厂类中创建
                类的对象
        在类的外部我们无法控制类的行为，但在类内部自己可以控制类的行为
    
    2，工厂设计模式的要求
        一般情况下，定义一个工厂类
        工厂类中的方法，应该就是公共的静态的方法
        该方法功能：就是根据传递的不同参数，去创建不同的类实例
    
    3，实例：创建不同形状类的对象
    
重载
    
    1，什么是重载
        1)其他编程语言中，面向对象的重载指的是，方法具有相同的名称，单是参数列表不同的
            情形，但PHP不支持同名函数或同名方法
        2)PHP所提供的重载(overloading)是指动态地创建类属性和方法，我们是通过
            魔术方法所实现的
        3)当调用当前环境下未定义或不可见的类属性或方法时，重载方法会被调用
        4)所有的重载方法都必须被声明为public
        5)属性重载只能在对象中进行，在静态方式中，这些魔术方法将不会被调用，
            所以这些方法都不能被声明为static
        6)这些魔术方法的参数都不能通过引用传递
    
    2，属性重载
        __get()魔术方法
            读取不可访问属性的值时，__get()会被调用
            public mixed __get(string $name)
        
        __set()魔术方法
            在给不可访问属性赋值时，__set()会被调用
            public void __set(string $name,mixed $value)
        
        __isset()魔术方法
            当对不可访问属性调用isset()或empty()时，__isset()会被调用

        __unset()魔术方法
            当对不可访问属性调用unset()时，__unset()会被调用
            public void __unset(string $name)
    
    3,方法重载
        __call()魔术方法
            在对象中调用一个不可访问方法时，__call()会被调用
            public mixed __call(string $name,array $arguments)
        
        __callStatic()魔术方法
            用静态方式中调用一个不可访问方法时，__callStatic()会被调用
            public mixed __callStatic(string $name,array $arguments)

变量序列化
    
    1，什么是变量序列化
        序列化是将变量转换为可保存或传输的字符串的过程
        反序列化就是在适当的时候把这个字符串在转化成原来的变量使用
        这两个过程结合起来，可以轻松地存储和传输数据，使程序更具维护性
        序列化有利于存储或传递PHP的值，同时不会丢失其类型和结构
        
        
    2，序列化函数serialize()
        产生一个可存储的值的表示
        string serialize(mixed $value)
        $value 可以是任何类型，除了资源外
        返回序列化之后的字符串，可以存储于任何地方
    
    3，反序列化函数unserialize()
        从已存储的表示中创建PHP的值
        mixed unserialize(string $str)
        对单一的已序列化的变量进行操作，将其转换回PHP的值
        
    4,对象序列化
        对象序列化过程，与其他变量数据一样
        对象序列化的内容只能包含成员属性
        当序列化对象时，serialize()函数会检查类中是否存在一个魔术方法__sleep()
           如果存在，该方法会先被调用，然后才执行序列化操作，此功能可以用于清理对象
           并返回一个包含对象中所有应被序列化的变量名称的数组
           
           魔术方法 __sleep()用来返回要序列化的对象属性的数组
           public function __sleep()
           {
            return array('db_host');
           }
           
           $str = serialize($obj)
           
    5，对象反序列化
        对象的反序列化过程，与其他变量数据一样
        当对象反序列化时，unserialize()函数会检查类中是否存在__wakeup()方法
            如果存在，则会先调用wakeup方法,预先准备对象需要的资源，__wakeup()经常
            用在反序列化操作中，进行一些初始化操作，例如重新建立数据库了解，或执行其他初始化操纵
            
            public function __wakeup()
            {
                $this->connectDb();//连接数据库
                $this->selectDb();//选择数据库
                $this->setCharset();//设置字符集
                
            }
            
            $str = file_get_contents('./2.txt');
            $db = unserialize($str);
## day11 Notes

### 命名空间和PDO

静态时延绑定
    
    1，什么是静态时延绑定？
        自PHP5.3之后，PHP增加了一个叫做后期静态绑定的功能，用于在继承范围内
            应用静态调用的类
        后期绑定的意思是说，static::不再被解析为定义当前方法所在的类，
            而是实际运行时计算的，也可以称之为静态绑定，因为他可用于静态方法的调用
        我们需要一个在调用执行时才确定当前类的一个特征，就是说将static关键字
            对某个类的绑定推迟到调用执行时，就叫静态延迟绑定
        
        语法：static::静态属性，静态方法，成员方法，类常量
        
    2，实例：静态时延绑定演示 
        
        如果只有一个类，self和static都代表当前类
        如果在继承范围，self永远代表当前类，static代表最终执行的类
       
       静态延时的绑定指的不是所在对象的绑定，而是最后执行的绑定

命名空间
    
    1,什么是命名空间
        从广义上来说，命名空间是一种封装事物的方法
        在很多地方都可以见到这种抽象概念，例如，在操作系统中目录用来将相关文件分组
            对于目录中的文件来说，它就扮演了命名空间的角色
        在PHP中，命名空间用来解决在编写类库或应用程序时名称冲突的问题
        PHP命名空间提供了一种将相关的类，函数，常量组合到一起的途径
        
    2，定义命名空间的要求  
        PHP在5.3.0以后的版本开始支持命名空间
        空间中可以包含任意合法的PHP代码，但只有三种代码受命名空间的保护
            他们是:类，函数，常量
        命名空间必须使用 namespace来声明
        命名空间必须是程序脚本的第一条语句 
        
    3，定义单个命名空间    
        namespace APP;
    
    4,实例：定义子命名空间
        使用 \ 斜线来分割子文件夹，例如：home\controller\a.txt
        使用 \ 斜线来分割子命名空间，例如：$obj= new Home\controller\Student()

使用命名空间
       
       1,文件系统中访问文件的方式
            相对文件名形式，foo.txt,被解析为-->curdir/foo.txt
            相对路径名形式,subdir/foo.txt，被解析为-->curdir/subdir/foo.txt
            绝对路径名形式，/main/foo.txt,被解析为 /main/foo.txt
       
       2,访问命名空间中元素的方式
            非限定名称(不带任何前缀),$obj=new User(),解析为：$obj = new current\User()
            限定名称(带相对空间前缀),$obj = new Home\User(),解析为：$obj= new current\Home\User()
            完全限定名称(从根空间开始),$obj = new \Home\User(),解析为,$obj= new\Home\User()
        
namespace关键字
    
    关键字namespace可用来显式访问当前命名空间或子命名空间中的元素，它等价于类中的self操作符
        
        第一个命名空间 App\Home\Controller
        class Student{}
        
        第二个命名空间 App\Home
        $obj = new namespace\Controller\Student();

命名空间元素的导入和别名
    
    1，描述
        允许通过别名引用或导入外部的完全限定名称，是命名空间的一个重要特征
        PHP命名空间支持两种使用别名或导入方式，为类名称使用别名，或命名空间名称使用别名
        在PHP中，导入是通过操作符use来实现的，别名是通过操作符as来实现的
        
        //起别名，导入App\Home\Controller空间中的Student类
        //最后一个 \ 后面就是类名,使用as起别名
        use App\Home\Controller\Student as Student1;
        
        创建App\Home\Controller空间中的Student类对象
        $obj = new Student1();
        
        
        
        
    2，实例，导入命名空间中的类并起别名
    
PDO概述
    
    1，PDO简介
        PDO是PHP数据对象(PHP Data Object)的缩写
        PDO扩展为PHP访问数据库定义了一个轻量级的、一致性的接口
        PDO作用是统一各种数据库的访问接口，PDO让跨数据库的使用更具亲和力
        有了PDO，就不必再使用mysqli_*函数、oci_*函数、mssql_*函数，
            也不必再为他们封装数据库操作类，只需要使用PDO接口中的
            方法就可以对各种数据库进行操作
        PDO是一个第三方的类，默认已经集成到PHP中了
    
    2，PDO的访问流程图
                                    PDO mysql引擎     mysql数据库
        
        PHP脚本代码     PDO数据对象     PDO oracle引擎    oracle数据库
                        
                                     PDO 其他引擎       其他数据库
                                     
        开启PDO扩展：即修改php.ini文件
        extension =  php_pdo_mysql.dll

    3,创建PDO类的对象
        描述：创建一个数据库连接的PDO对象
        语法：PDO::__construct(string $dsn,string $username,string $password)
        参数：
            $dsn:数据源名称叫做DSN，包含了请求连接到数据库的信息，通常一个
                DSN由PDO驱动名，紧随其后的冒号，以及具体PDO驱动的连接语法组成
            例如：$dsn="mysql:host=127.0.0.1;port=3306;dbname=db;charset=utf-8
            $username,数据库用户名
            $password,数据库密码
        返回值：成功则返回一个PDO对象
        
PDO对象常用方法
    
    1，PDO::exec()方法
        执行一条sql语句，并返回受影响的行数
        int PDO::exec(string $sql)
        $sql 要被预处理和执行的SQL语句
        不会从SELECT语句返回结果
        返回：返回受修改或删除SQL语句影响的行数，如果没有受影响的行，则返回0
    
    2，PDO::query()方法
        描述：执行一条sql语句，返回一个结果集对象(PDOStatement)
        语法：public PDOStatement PDO::query(string $statement)
        提示：主要用于select、show语句
        返回：执行成功返回PODStatement对象，执行失败返回FALSE
    
    3,PDO::lastInsertId()方法
        描述:返回最后插入行的id或序列值
        语法：string PDO::lastInsertId(void)
        返回：返回最后插入行的id
    
    4,PDO::setAttribute()方法
        描述：设置数据库句柄属性
        语法：bool PDO::setAttribute(int $attribute,mixed $value)
        提示：PDO内置了一些可用的通用属性(详细建手册)
            PDO::ATTR_CASE:强制列名为指定的大小写
            PDO:ATTR_ERRMODE:错误报告
            PDO:ATTR_DEFAULT_FETCH_MODE:设置默认的提取模式
        返回：成功时返回TRUE，失败返回false

PDOStatement 对象常用方法
    
    1,PDOStatement::fetch()方法
        从结果集中取除一行，并向下移动指针
        PDOStatement::fetch(int $fetch_style)
        参数:fetch_style,控制下一行如何返回给调用者
            PDO::FETCH_ASSOC,返回一个索引为结果集列名的数组
            PDO::FETCH_BOTH(默认),返回一个索引为以结果集列名和以0开始的列号的数组
            PDO::FETCH_NUM,返回一个以索引为0开始的记过集列号的数组
        返回：此函数，成功时返回的值依赖于提取类型，在所有情况下，失败返会false
    
    2，PDOStatement::fechAll()方法
        从结果集中返回一个包含结果集中所有行的数组
        PDOStatement::fetchAll(int $fetch_style)
        参数:fetch_style,控制下一行如何返回给调用者
            PDO::FETCH_ASSOC,返回一个索引为结果集列名的数组
            PDO::FETCH_BOTH(默认),返回一个索引为以结果集列名和以0开始的列号的数组
            PDO::FETCH_NUM,返回一个以索引为0开始的记过集列号的数组

    3，PODStatement::rowCount()方法
        返回上一个受sql语句影响的行数
        int PODStetement::rowCount(void)
        返回：返回上一个有对应的PDOStatement对象执行SELECT，DELETE,INSERT,或
            UPDATE语句受影响的行数
        提示：要想使用该函数，必须使用$pdo->query()返回PDOStatement对象

PDO错误处理
    
    1，PDO支持三种错误模式
        静默模式(Slient)：错误发生后，不主动报错，是默认的模式
        警告模式(Warning)：错误发生后，通过PHP标准来报告错误
        异常模式(Exception)：错误发生后，抛出异常，需要捕捉和处理
        提示：可以通过PDO::setAttribute()更改错误模式
    
    2,静默模式(Slient)
        在静默模式下，当有错误发生时，不会显示在页面上
        此时，可以通过PDO的PDO::errorCode()和PDO::errorinfo()两个方法，来获取错误信息
    
    3,警告模式(Warning)
        因为默认错误模式是静默模式,如果想报警告错误，必须使用setAttribute()方法来设置
    
    4,异常模式(Exception)
        提前使用 setAttribute()方法提前设置
        
        try{
            //试图正常运行的程序代码
            //如果程序有错误发生，自动跳转到catch代码块运行
        }catch(PDOException $e){
            //PDOException:是PDO错误异常类
            //$e对象：是有PDOEcxeption生成的对象
            //输出错误对象$e中的错误信息
        }

SQL语句预处理
    
    1，SQL语句执行过程
        分两个阶段:编译和执行
        如果SQL语句是第一次执行，先编译再执行，编译过程十分复杂，耗用系统资源，相对不太安全
        如果是第二次执行(相同的SQL语句),直接从缓存中读取，无疑执行效率是最高的
            也是，比较安全的，可以有效避免SQL注入等安全问题      
    
    2，PDO的SQL语句预处理步骤
        1)PDO完成预处理需要的步骤
            先提取相同结构的sql部分(将数据部分，可变的部分去掉)
            编译这个相同的结构，将编译结果保存
            在将不同的数据部分进行替换
            执行即可
            
        2)提取相同结构的SQL语句 
           在SQL语句中，使用命名参数和问号参数，来代替可变的数据
           使用占位符".value"和"?"来代替可变的数据
        
        3)预编译相同结构的SQL语句
            描述：执行编译的SQL语句结构，并返回一个PDOSstatement对象
            语法：public PDOStatement PDO::prepare(string $statement)
            返回：执行成功返回PDOStatement对象，失败返回FALSE
        
        4)给占位符绑定数据
            描述：绑定一个值到预处理的SQL语句中的对应命名占位符或问号占位符
            语法：bool PDOStatement::bindValue(mixed $parameter,mixed $value)
            参数：
                $parameter:参数标识符，对于使用命名占位符的预处理语句，应是类似
                    :name形式的参数名，对于使用问号占位符的预处理语句，应是
                    1开始索引的参数位置
                $value:绑定到参数的值
            返回：TRUE/FALSE
            
        5)执行预处理的SQL语句           
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
    
## day13 Notes

### MVC

MVC第12个版本 平台概念引入
    
    1，需求分析
        平台：就是前台，后台，合作方平台 等这样一些概念的总称
        在一个MVC框架结构中，往往都可能有多个相对独立的应用站点，最典型的就是一个
            网站的前台界面(对外的),和后台管理界面(对内的)
        一个平台，就是一个相对独立的应用(站点，项目)
        有了平台概念后，MVC的目录结构，就要进一步扩展了
        引入平台概念后，客户的每次请求，必须带3各参数，平台参数，控制器参数，用户动作
        platform称为p参数，controller称为c参数，action简称为a参数
        请求地址：index.php?p=平台&c=控制器&a=动作&其他参数
        例如：index.php?p=Home&c=Student&a=index
        
        MVC最后的目录结构
        ---index.php            入口文件
        ---Frame/               框架核心类文件
        ---App/                 应用目录
        -------Conf/           配置目录
        -------Home/           前台应用目录
        -----------Controller/  前端控制器
        -----------Model/       前端模型目录
        -----------View/        前端视图目录
        -------Admin/           后台应用目录
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
        
    2，修改index。php文件
    
    4,修改视图文件导航栏地址和JS跳转地址
    
    5，修改控制器方法中跳转地址

MVC 13 类的自动加载
    
    1，需求分析
    2，修改index。php文件

MVC 14 常用目录常量配置
    
    1，需求分析
        我们可以把目录定义为常量，简化目录路径的编写
        
    2，修改index。php文件

MVC 15 初始类实现
    
    1，修改index.php文件
    
    2，配置文件：./App/Conf/Config.php
    
    3,创建初始框架类文件：./Frame/Frame.class.php
    
    4,修改基础模型类文件：./Frame/BaseModel.class.php
    
    5,修改数据库工具类文件：./Frame/Db.class.php