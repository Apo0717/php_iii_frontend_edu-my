<?php
//不使用陣列索引鍵 key使用in   value使用of
//of只能使用在有序
$arrSeasons = ['春','夏','秋','冬'];
echo "每年的四季為: ";
foreach($arrSeasons as $value){
    echo $value."&nbsp;";
}

echo "<hr>";

//各別輸出陣列的索引鍵 key，同時輸對應的值 value
$arrPerson = [
    '學號' => '103',
    '姓名' => '孫小美',
    '性別' => '女',
    '生日' => '2000/7/15',
    '手機號碼' => '0939666999'
    ];
foreach($arrPerson as $key => $value){
    echo $key.": ".$value."<br/>";
}    