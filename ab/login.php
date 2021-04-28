<?php
session_start();

//引用資料庫連線
require_once('./db.inc.php');

if( isset($_POST['username']) && isset($_POST['pwd']) ){
    //SQL語法
    $sql = "SELECT `username`, `pwd`
            FROM `admin`
            WHERE `username` = ?
            AND `pwd` = ? ";

    $arrParam = [
        $_POST['username'],sha1($_POST['pwd'])
    ];

    $pdo_stmt = $pdo->prepare($sql);
    //prepare()為了不讓SQL Injection發生
    
}
