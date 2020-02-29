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