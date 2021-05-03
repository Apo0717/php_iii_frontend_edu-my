<?php
require_once("./checkAdmin.php");
require_once("../db.inc.php");

$total = $pdo->query("SELECT count(1) AS `count` FROM `items`")->fetchAll()[0]['count'];

$numPerPage = 5;

$totalPages = ceil($total/$numPerPage);

$page = isset($_GET['page'])? (int)$_GET['page']: 1;

$page = $page < 1 ? 1 : $page;

$totalCatgoris = $pdo->query("SELECT count(1) AS `count` FROM `categories`")->fetchAll()[0]['count'];

?>

<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <style>
    .border {
        border: 1px solid;
    }
    img.itemImg {
        width: 250px;
    }
    </style>
</head>
<body>

<?php require_once('./templates/title.php'); ?>

<hr />

<h3>商品列表</h3>
