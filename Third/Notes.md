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
            
        
        
        
    
        