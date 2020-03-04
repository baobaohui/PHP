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
        
        
    
        