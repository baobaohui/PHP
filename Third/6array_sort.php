<?php
$arr = [18,22,12,15,23,9];
/*
 * 进行冒泡排序，每行找出最大值
 */
$n = count($arr);
for($i=0;$i<$n-1;$i++)
{
    for($j=0;$j<$n-1-$i;$j++)
    {
        if($arr[$j]>$arr[$j+1])
        {
            $temp = $arr[$j];
            $arr[$j] = $arr[$j+1];
            $arr[$j+1] = $temp;
        }
    }
}
echo "<br>完成排序";



//选择排序
//每次找出最大值与最后一个位置上的数据交换位置
//“最后一个位置” 每次前进1
$arr2 = [18,22,12,15,23,9];
//implode("字符",$数组)：将该数组的所有项用给定字符“连接起来”
echo "<br>交换前：".implode(',',$arr2);
$n2 = count($arr2);

for($i=0;$i<$n2-1;$i++)
{
    //找出最大值，并记录下标
    $max2 = $arr2[0];
    $max_key2 = 0;
    for($k=0;$k<$n-$i;$k++)
    {
        if($arr2[$k]>$max2)
        {
            $max2 = $arr2[$k];
            $max_key2 = $k;
        }
    }

    //进行数据交换
    $temp = $arr2[$max_key2];
    $arr2[$max_key2] = $arr2[$n2-1-$i];
    $arr2[$n2-1-$i] = $temp;
}
echo "<br>完成数据交换".implode(',',$arr2);
