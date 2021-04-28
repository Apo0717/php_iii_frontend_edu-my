<?php
session_start();
//判斷是否登入 (確認先前指派的 session 索引是否存在)
if( !isset($_SESSION['usernmame']) ){
    session_destroy();
    //3秒後跳頁
    header("Refresh: 3; url=./9-3.php");
    echo "請確實登入…3 秒後自動回登入頁";
    exit();
}
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
    這裡是後端管理頁面 - <a href="./9-3-3-logout.php?logout=1">登出</a>
</body>
</html>
}
