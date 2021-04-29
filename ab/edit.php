<?php
require_once('./checkSession.php'); //引入判斷是否登入機制
require_once('./db.inc.php'); //引用資料庫連線
require_once("./templates/title.php");
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
    .w200px {
        width: 200px;
    }
    </style>
</head>
<body>
    <table class="border">
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `id`, `studentId`, `studentName`, `studentGender`, `studentBirthday`, 
        `studentPhoneNumber`, `studentDescription`, `studentImg`
        FROM `students` 
        WHERE `id` = ?";

        //設定繫結值
        $arrParam = [
            (int)$_GET['id']
        ];

        //查詢
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);
        if($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll()[0];
        ?>
            <tr>
                <td class="border">學號</td>
                <td class="border">
                    <input type="text" name="studentId" value="<?php echo $arr['studentId']; ?>" maxlength="9" />
                </td>
            </tr>
            <tr>
                <td class="border">姓名</td>
                <td class="border">
                    <input type="text" name="studentName" value="<?php echo $arr['studentName'] ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">性別</td>
                <td class="border">
                    <select name="studentGender">
                        <option value="<?php echo $arr['studentGender'] ?>" selected><?php echo $arr['studentGender'] ?></option>
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="border">生日</td>
                <td class="border">
                    <input type="text" name="studentBirthday" value="<?php echo $arr['studentBirthday'] ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">手機號碼</td>
                <td class="border">
                    <input type="text" name="studentPhoneNumber" value="<?php echo $arr['studentPhoneNumber'] ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">個人描述</td>
                <td class="border">
                    <textarea name="studentDescription"><?php echo $arr['studentDescription'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td class="border">大頭貼</td>
                <td class="border">
                <?php if($arr['studentImg'] !== NULL) { ?>
                    <img class="w200px" src="./files/<?php echo $arr['studentImg'] ?>" />
                <?php } ?>
                <input type="file" name="studentImg" />
                </td>
            </tr>
            <tr>
                <td class="border">功能</td>
                <td class="border">
                    <a href="./delete.php?id=<?php echo $arr['id'] ?>">刪除</a>
                </td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td class="border" colspan="6">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
            <td class="border" colspan="6"><input type="submit" name="smb" value="修改"></td>
            </tr>
        </tfoo>
    </table>
    <input type="hidden" name="id" value="<?php echo (int)$_GET['id'] ?>">
</form>
</body>
</html>