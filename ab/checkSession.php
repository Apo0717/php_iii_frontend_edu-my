<?php
session_start();
//將每個需要判斷的頁面連接到這，就不用一直寫，還可以統一更改 :D
//判斷是否登入 (確認先前指派的 session 索引是否存在) 
if( !isset($_SESSION['username']) ){
    //"!"<<如果"不"符合索引資料
    //則關閉session，
    session_destroy();
    header("Refresh: 3; url=./9-3.php");
    echo "請確實登入…50 秒後自動回登入頁";
    exit();
    //並且直接停止執行，沒加這行會繼續執行下去，
}
?>