<?php
//定义最终的分页类
final class Pager
{
    //私有的分页参数
    private $page;//当前页
    private $pages;//总页数

    //公共的构造方法
    public function __construct($page,$pages)
    {
        $this->page = $page;
        $this->pages = $pages;
    }

    //公共的分页方法
    public function fenye()
    {
        //循环起点和终点
        $start = $this->page-5;
        $end =  $this->page+4;
//如果当前页<=6时
        if($this->page<=6)
        {
            $start = 1;
            $end = 10;
        }
//如果$page>=$pages-4
        if($this->page>=$this->pages-4)
        {
            $start = $this->pages-9;
            $end = $this->pages;
        }
//如果$pages<10;
        if($this->pages<10)
        {
            $start =1;
            $end = $this->pages;
        }
//循环输出所有页码
        for($i=$start;$i<=$end;$i++)
        {
            //当前页不加链接
            if($this->page == $i)
            {
                echo "<span>$i</span>";
            }
            else
            {
                echo "<a href='?page=$i'>$i</a>";
            }
        }

    }
}

