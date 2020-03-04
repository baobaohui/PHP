<?php
//实例：将新浪新闻主页另存到本地
$filename = "https://news.sina.com.cn/";

//读取网页内容到字符串中
$str = file_get_contents($filename);

//另存到本地文件
file_put_contents("./test.html",$str);