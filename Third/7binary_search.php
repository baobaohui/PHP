<?php
//二分查找
//给定一个已排序数组 查找一个确定值
$arr = [2,5,8,15,18,22,35,45,78,90];
$search = 15;

$left = 0;
$right = count($arr)-1;
$mid = round((int)($left+$right)/2);
echo "开始的left:$left";
echo "<br>开始的right:$right";
echo "<br>开始的mid:$mid";

function binary_search($arr,$left,$mid,$right,$search)
{
    while($left <= $right)
    {
        if($arr[$mid] == $search)
        {
            # echo "数字已找到！下标为{$mid},大小为 {$arr[$mid]}";
            echo "<br>数字已找到！";
            break;
        }
        if($arr[$mid]>$search)
        {
            $right = $mid - 1;
            $mid = round((int)($left+$right)/2);
        }
        if($arr[$mid]<$search)
        {
            $left= $mid + 1;
            $mid = round((int)($left+$right)/2);
        }
    }

    echo "<br>while循环结束";
    echo "<br>$left";
    echo "<br>$right";
    echo "<br>$mid";
}

binary_search($arr,$left,$mid,$right,$search);