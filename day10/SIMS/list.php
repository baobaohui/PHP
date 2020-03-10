<?php
//包含连接数据ku的公共文件
require_once("conn.php");

//每条显示行数
$pagesize = 4;

//获取当前页码和计算开始行号
$page = isset($_GET['page']) ? $_GET['page']:1;
$startrow = ($page-1)*$pagesize;

//获取总记录数和计算总页数
$sql = "select *from student";
$records = $db->rowCount($sql);
$pages = ceil($records/$pagesize);

//构建分页查询的sql语句
$sql = "select *from student order by id asc limit {$startrow},{$pagesize}";
$arrs = $db->fetchAll($sql);  //获取所有行数据


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
</head>
<body>
<div style="text-align:center;padding-bottom: 10px;">
    <h2>学生信息管理中心</h2>
    <a href="./add.php">添加学生</a>
    共有 <font color="red"><?php echo $records ?></font>个学生信息

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
                <a href="./edit.php">修改</a>
                <a href="javascript:void(0)" onclick="confirmDel(<?php echo $arr['id'] ?>)">删除</a>

            </td>
        </tr>

        <?php
    }
    ?>
    <tr>
        <td colspan="9" align="center" height="50" class="pagelist">
            <?php
                //创建分页对象
                $pageObj = new Pager($page,$pages);

                //调用分页方法，显示分页结果
                $pageObj->fenye();
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
            // window.location.href ="./delete.php?id="+id;
            window.location.href="./delete.php?id="+id;
        }
    }

</script>
</html>

