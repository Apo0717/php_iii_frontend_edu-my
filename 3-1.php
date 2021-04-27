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
    //使用雙引號，變數可以嵌入字串來顯示
    $strr = '銀河修理皮';
    echo "Hi, $strr <br/>";
    echo "Hi, {$strr} <br />";
    echo "Hi, ${strr} <br />";

    echo "<br /><br />";

//使用單引號括住字串，變數會變成一般字串
    echo 'Hi, $strr <br />';
    echo 'Hi, {$strrstrr} <br />';
    echo 'Hi, ${strr} <br />';
    ?>    
</body>
</html>