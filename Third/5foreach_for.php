<?php
$a =[12,12,34,56];
$max =$a[0];
$max_key=0;
foreach ($a as $key=>$value)
{
    if($value>$max)
    {
        $max = $value;
        $max_key = $key;
    }
}

echo "最大值：$max,对应下标：$max_key";