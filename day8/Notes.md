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