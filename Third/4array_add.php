<?php
//求数组的和

$a = [1,3,5,6];
$len = count($a);
$sum = 0;
for($i=0;$i<$len;$i++)
{
    $sum += $a[$i];
}
echo "a数组的总和为：".$sum;

//二维数组
$a2 = [
    [65,6,9,2],
    [3,4,5,6],
    [55,6,75,2],
];
$len2 = count($a2);
$sum2 = 0;
for($i=0;$i<$len2;$i++)
{
    $temp = $a2[$i];
    $len3 = count($temp);
    for($j=0;$j<$len3;$j++)
    {
        $sum2+= $temp[$j];
    }
}
echo "<br>二维数组的和为:".$sum2;
