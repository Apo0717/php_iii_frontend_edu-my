<?php
require_once('./checkSession.php'); //引入判斷是否登入機制
require_once('./db.inc.php'); //引用資料庫連線
require_once("./templates/title.php");

$sql = "UPDATE `students`
        SET
        `studentId` = ?, 
        `studentName` = ?,
        `studentGender` = ?,
        `studentBirthday` = ?,
        `studentPhoneNumber` = ?,
        `studentDescription` = ? ";

$arrParam = [
    $_POST['studentId'],
    $_POST['studentName'],
    $_POST['studentGender'],
    $_POST['studentBirthday'],
    $_POST['studentPhoneNumber'],
    $_POST['studentDescription']
];

$sql.= "WHERE `id` = ? ";
$arrParam[] = (int)$_POST['id'];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if( $stmt->rowCount() > 0 ){
    header("Refresh: 3; url=./admin.php");
    echo "更新成功";
} else {
    header("Refresh: 3; url=./admin.php");
    echo "沒有任何更新";
}