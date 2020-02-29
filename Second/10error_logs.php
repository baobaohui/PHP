<?php
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
