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
        