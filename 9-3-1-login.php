<?php
session_start();

//預設帳號密碼
$userName = 'test';
$pwd = sha1('test'); //sha1雜湊後的字串

//用 isset 判斷 POST 撈的 userName 跟 pwd 是否存在
if( isset($_POST['username']) && isset($_POST['pwd']) ){
    //判斷帳號、密碼是否正確
    if($_POST['username'] === $userName && sha1($_POST['pwd']) === $pwd){
        //3 秒後跳頁
        header("Refresh: 3; url=./9-3-2-admin.php");
        //將傳送過來的 post 變數資料，放到 session，
        $_SESSION['username'] = $_POST['username'];
        echo "登入成功!!! 3 秒後自動進入後端頁面";
    }else{
        //登入失敗，關閉session
        session_destroy();
        //3 秒後跳頁
        header("Refresh: 3; url=./9-3.php");
        echo "登入失敗…3 秒後自動回登入頁";
    }      
}else {
    //關閉 session
    session_destroy();
    //3 秒後跳頁
    header("Refresh: 3; url=./9-3.php");
    echo "請確實登入…3 秒後自動回登入頁";
    }
    