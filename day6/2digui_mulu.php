<?php
//实例，递归现实day5目录中的所有条目

function show_all_files($dir)
{
    //打开目录返回目录句柄资源
    $handle = opendir($dir);

    echo "<ul>";
    //循环读取目录中所有条目
    while($line = readdir($handle))
    {
        //如果是 . 或者 .. 则跳过
        if($line=='.' || $line=="..")
        {
            continue;//中止本次循环，开始下一次循环
                     //本次循环的剩余代码不再执行
        }
        echo "<li>$line</li>";

        //如果当前条目是目录，则递归调用
        if(is_dir($dir."/".$line))
        {
            show_all_files($dir."/".$line);
        }
    }
    echo "</ul>";
}

echo "递归现实day5目录中的所有条目<br>";
//调用函数
show_all_files("../day5");