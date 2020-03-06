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