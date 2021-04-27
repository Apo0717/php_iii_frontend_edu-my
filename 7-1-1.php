<?php
//列出所有 GET 變數的資訊
//以「$_」開頭的 PHP 變數，原則上屬於全域變數，例如 $_GET、$_POST、$_FILES、$_SERVER、$_SESSION、$_COOKIE 等。

echo $_GET['ro'];
echo "<hr>";
echo $_GET['jobcat'];
echo "<hr>";
echo $_GET['kwop'];
echo "<hr>";
echo $_GET['keyword'];
echo "<hr>";
echo $_GET['expansionType'];
echo "<hr>";
echo $_GET['area'];
echo "<hr>";
echo $_GET['order'];
echo "<hr>";
echo $_GET['asc'];
echo "<hr>";
echo $_GET['page'];
echo "<hr>";
echo $_GET['mode'];
echo "<hr>";
echo $_GET['jobsource'];
echo "<hr>";


//判斷陣列元素是否初始化在GET值的時候就會很常用到

if( isset($_GET["keyword"]) ){
    echo '有，$_GET["keyword"]';
} else {
    echo '沒有，$_GET["keyword"]';
} exit();