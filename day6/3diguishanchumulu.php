<?php
//实例：递归删除day5目录
function del_all_files($dir)
{
    //打开目录
    $handle = opendir($dir);

    //循环读取所有条目
    while($line = readdir($handle))
    {
        //如果是 ’.' '..'，则跳过
        if($line =='.' || $line=='..')
        {
            continue;
        }

        //判断是文件，还是目录
        if(is_dir($dir."/".$line))
        {
            //递归调用
            del_all_files($dir."/".$line);
        }
        else{
            //如果是文件，直接删除
            unlink($dir."/".$line);
        }
    }
    //关闭目录
    closedir($handle);

    //删除目录
    rmdir($dir);
}
//调用函数
del_all_files("./day5");//正确路径为 ../day5