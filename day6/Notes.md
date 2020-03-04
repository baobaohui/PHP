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