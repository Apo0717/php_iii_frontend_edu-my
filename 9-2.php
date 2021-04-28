<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //儲存/輸入 session 資料 
    $_SESSION['myName'] = 'Darren';
    //取得 seesion 資料
    $myName = $_SESSION['myName'];
    //輸出 session 資料
    echo '我從session裡取得的資料: ' . $myName;
    ?>
</body>
</html>