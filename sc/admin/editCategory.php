<?php
require_once('./checkAdmin.php'); //引入登入判斷
require_once('../db.inc.php'); //引用資料庫連線
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <form name="myform" method="POST" action="./updateCategory.php">
    <table class="border">
        <thead>
            <tr>
                <th class="border">種類名稱</th>
                <th class="border">新增時間</th>
                <th class="border">更新時間</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT `categoryId`, `categoryName`, `created_at`, `updated_at`
            FROM  `categories`
            WHERE `categoryId` = ? ";
            
            //強制變成整數
            $arrParam = [(int)$_GET['editCategoryId']];
            
            //查詢
            $stmt = $pdo->prepare($sql);
            $stmt->execute($arrParam);

            //資料數大於0，代表有東西，則列出相關資料
            if($stmt->rowCount() > 0){
                $arr = $stmt->fetchAll()[0];
            ?>
                <tr>
                    <td class="border">
                        <input type="text" name="categoryName" value="<?php echo $arr['categoryName']; ?>" maxlength="100" />
                    </td>
                    <td class="border"><?php echo $arr['created_at']; ?></td>
                    <td class="border"><?php echo $arr['updated_at']; ?></td>
                </tr>
            <?php
            } else {
            ?>
                <tr>
                    <td colspan="3">沒有資料</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
            <?php if($stmt->rowCount() > 0){ ?>
                <td colspan="3"><input type="submit" name="smb" value="更新"></td>
            <?php } ?>
            </tr>
        </tfoot>
    </table>
    <input type="hidden" name="editCategoryId" value="<?php echo (int)$_GET['editCategoryId']; ?>">
</form>

        </tbody>
    </table>
</body>
</html>