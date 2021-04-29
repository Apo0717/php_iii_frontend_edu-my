<?php
require_once('./checkSession.php'); //引入判斷是否登入機制
require_once('./db.inc.php'); //引用資料庫連線

//先查詢出特定 id (editId) 資料欄位中的大頭貼檔案名稱
$sqlGetImg = "SELECT `studentImg` FROM `students` WHERE `id` = ? ";
$stmtGetImg = $pdo->prepare($sqlGetImg);

//加入繫結陣列
$arrGetImgParam = [
    (int)$_GET['id']
];

//執行 SQL 語法
$stmtGetImg->execute($arrGetImgParam);

//execute >> set
//rowCount >> run

//若有找到 studentImg 的資料
if($stmtGetImg)->rowCount() > 0 ){
    //取得指定 id 的學生資料 (1筆)
    $arrImg = $stmtGetImg->fetchALL()[0];

    ////若是 studentImg 裡面不為空值，代表過去有上傳過
    if($arrImg['studentImg'] !== NULL){
        //unlink:刪除實體檔案  unlink加上@:不報錯(不管有沒有找到檔案)直接刪除
        //指定目的地資料夾+檔名
        @unlink("./files/".$arrImg['studentImg']);
    }
}


//SQL 語法
$sql = "DELETE FROM `students` WHERE `id` = ? ";

//加入繫結陣列
$arrParam = [
    (int)$_GET['id']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./admin.php");
    echo "刪除成功";
} else {
    header("Refresh: 3; url=./admin.php");
    echo "刪除失敗";
}