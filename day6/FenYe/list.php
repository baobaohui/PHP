<?php
    //包含连接数据据的公共文件
    require_once("./conn.php");

    //分页参数：每页显示多少条
    $pagesize = 1;

    //获取当前页码和计算开始行号
    $page = isset($_GET['page'])?$_GET['page']:1;//当前页码
    $startrow = ($page -1)*$pagesize;//开始行号

    //获取总记录数和计算总页数
    $sql = "select *from student";
    $result = mysqli_query($link,$sql); //查询结果
    $records = mysqli_num_rows($result);    //总共条数
    $pages = ceil($records/$pagesize);  //页数

    //构建查询的分页的SQL语句
    $sql .= " order by id asc limit {$startrow},{$pagesize}";

    //执行新的sql语句，返回结果集对象
    $result = mysqli_query($link,$sql);
    //从结果集中获取多行数据
    $arrs = mysqli_fetch_all($result,MYSQLI_ASSOC);


//    $arrs = mysqli_fetch_all($result,MYSQLI_ASSOC);  //获取所有行数据
//    #print_r($arrs);    //打印行数据
//    $records = mysqli_num_rows($result);    //获取学生人数
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style type="text/css">
    .pagelist{

    }
    .pagelist a{
        padding:3px 8px;
        text-decoration: none;
        margin:0px 3px;
        border:1px solid #ccc;
    }
    .pagelist a:hover{
        color: red;
        background-color:#99cc00;
    }
    .pagelist span{
        padding:3px 8px;
    }
</style>
<body>
<div style="text-align:center;padding-bottom: 10px;">
    <h2>学生信息管理中心</h2>
</div>

<table width="600" border="1" align="center" rules="all" cellpadding="5">
    <tr bgcolor="#ccc">
        <th>编号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>年龄</th>
        <th>学历</th>
        <th>工资</th>
        <th>奖金</th>
        <th>籍贯</th>
        <th>操作选项</th>

    </tr>
    <?php
    //循环二维数组
    foreach($arrs as $arr) {
        ?>
        <tr align="center">
            <td><?php echo $arr['id'] ?></td>
            <td><?php echo $arr['name'] ?></td>
            <td><?php echo $arr['sex'] ?></td>
            <td><?php echo $arr['age'] ?></td>
            <td><?php echo $arr['edu'] ?></td>
            <td><?php echo $arr['salary'] ?></td>
            <td><?php echo $arr['bonus'] ?></td>
            <td><?php echo $arr['city'] ?></td>
            <td>
                <a href="">修改</a>
                <a href="" onclick="confirmDel(<?php echo $arr['id'] ?>)">删除</a>

            </td>
        </tr>

        <?php
    }
    ?>
        <tr>
            <td colspan="9" align="center" height="50" class="pagelist">
                <?php

                    //循环起点和终点
                    $start = $page-5;
                    $end = $page+4;
                    //如果当前页<=6时
                    if($page<=6)
                    {
                        $start = 1;
                        $end = 10;
                    }
                    //如果$page>=$pages-4
                    if($page>=$pages-4)
                    {
                        $start = $pages-9;
                        $end = $pages;
                    }
                    //如果$pages<10;
                    if($pages<10)
                    {
                        $start =1;
                        $end = $pages;
                    }
                    //循环输出所有页码
                    for($i=$start;$i<=$end;$i++)
                    {
                        //当前页不加链接
                        if($page == $i)
                        {
                            echo "<span>$i</span>";
                        }
                        else
                        {
                            echo "<a href='list.php?page=$i'>$i</a>";
                        }
                    }

                ?>

            </td>

        </tr>


</table>

</body>
<script type="text/javascript">

    //删除函数
    function confirmDel(id) {
        //询问是否删除
        if(window.confirm("是否确定删除?"))
        {
            //如果单击“确定"按钮，跳转到delete.php页面
            window.location.href = "./delete.php?id="+id;
        }
    }

</script>
</html>
