<?php
require_once('./checkSession.php'); //引入判斷是否登入機制
require_once('./db.inc.php'); //引用資料庫連線

//SQL 敘述: 取得 SQL 資料庫中的 students 資料表總筆數
//SELECT count(1) 為 SQL 語法，撈出(FORM中)的資料非空值總數
//SELECT count(*) 為 SQL 語法，撈出(FORM中)的資料總數(包含空值)
$sqlTotal = "SELECT count(1) AS `count` FROM `students`";


//執行 SQL 語法，並回傳、建立 PDOstatment 物件
$stmtTotal = $pdo->query($sqlTotal);

//查詢結果，取得第一筆資料(索引為 0)
$arrTotal = $stmtTotal->fetchAll()[0];

//資料表總筆數
$total = $arrTotal['count'];


//上面的作法，可以直接寫成： 
//$total = $pdo->query($sqlTotal)->fetchAll()[0]['count'];


//定義每頁有幾筆資料。
$numPerPage = 5;

//總頁數，ceil()為無條件進位，準確來說，是取得大於等於所給數字的最小整數。
//ex:今天總共有13筆資料，欲在每頁顯示5筆資料的狀況下，總共會有3(2+1)頁，13/5=2...3，因為最後餘數的3筆資料也要有一頁去裝填顯示。
$totalPages = ceil($total/$numPerPage);

//目前在第幾頁
//此時的['page']為超前部屬(?)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

//保護措施:若 page 小於 1，則回傳 1
$page = $page < 1 ? 1 : $page;

require_once("./templates/title.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>打到吐血的 PHP</title>
    <style>
        .border{
            border: 1px solid;
        }
    </style>
</head>
<body>
 <form name="myForm" method="POST" action="deleteIds.php">
    <table class="border">
        <thead>
            <tr>
                <th class="border">選擇</th>
                <th class="border">學號</th>
                <th class="border">姓名</th>
                <th class="border">性別</th>
                <th class="border">生日</th>
                <th class="border">手機號碼</th>
                <th class="border">個人描述</th>
                <th class="border">大頭貼</th>
                <th class="border">功能</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `id`, `studentId`, `studentName`, `studentGender`, `studentBirthday`, 
                        `studentPhoneNumber`, `studentDescription`, `studentImg`
                FROM `students` 
                ORDER BY `id` ASC 
                LIMIT ?, ? ";

        //設定繫結值
        $arrParam = [
            ($page - 1) * $numPerPage, 
            $numPerPage
        ];

        //查詢分頁後的學生資料
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);

        //資料數量大於 0，則列出所有資料
        if($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll();
            for($i = 0; $i < count($arr); $i++) {
        ?>
            <tr>
                <td class="border">
                    <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['id'] ?>" />
                </td>
                <td class="border"><?php echo $arr[$i]['studentId'] ?></td>
                <td class="border"><?php echo $arr[$i]['studentName'] ?></td>
                <td class="border"><?php echo $arr[$i]['studentGender'] ?></td>
                <td class="border"><?php echo $arr[$i]['studentBirthday'] ?></td>
                <td class="border"><?php echo $arr[$i]['studentPhoneNumber'] ?></td>
                <td class="border"><?php echo nl2br($arr[$i]['studentDescription']) ?></td>
                <td class="border">
                    <img style="width: 200px;" src="./files/<?php echo $arr[$i]['studentImg'] ?>">
                <?php } ?>
                </td>
                <td class="border">
                    <a href="./edit.php?id=<?php echo $arr[$i]['id']; ?>">編輯</a>
                    <a href="./delete.php?id=<?php echo $arr[$i]['id']; ?>">刪除</a>
                </td>
            </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td class="border" colspan="9">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="9">
                <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                    <a href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                <?php } ?>
                </td>
            </tr>
        </tfoot>
    </table>
    <input type="submit" name="smb" value="刪除">
</form>

</body>
</html>