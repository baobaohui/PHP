<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
    $n1 = "";
    $n2 = "";
    $result = "";
    if(isset($_POST['num1']))
    {
        $n1 = $_POST['num1'];
        $n2 = $_POST['num2'];
        $result = $n1 + $n2;
    }

    echo PHP_VERSION;
?>
<body>
<form action="post_data.php" method="post">
    数字1<input type="text" name="num1" value="<?php echo $n1 ?>">
    +
    数字2<input type="text" name="num2" value="<?php echo $n2 ?>">

    <input type="submit" value="=">
    <input type="text" name="result" value="<?php echo $result ?>">
</form>
</body>
</html>
