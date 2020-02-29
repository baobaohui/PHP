<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    //进制转换
    $n1 = "";
    $n2 = "";
    $zh = "";

    if(isset($_POST['submit1']))
    {
        $n1 = $_POST['n1'];
        $zh = $_POST['zhuanghuan'];
        if($zh == "10to2")
        {
            $n2 = decbin($n1);
        }
        if($zh == "10to8")
        {
            $n2 = decoct($n1);
        }
    }

?>
<form action="2base_conversion.php" method="post">
    <input type="text" name="n1" value="<?php echo $n1 ?>">
    <select name="zhuanghuan">
        <option value="10to2" <?php if($zh == "10to2"){echo "selected";} ?> >10to2</option>
        <option value="10to8" <?php if($zh == "10to8"){echo "selected";} ?> >10to8</option>
    </select>
    <input type="submit" name="submit1" value="转换">
    <input type="text" name="n2" value="<?php echo $n2 ?>">
</form>
</body>
</html>