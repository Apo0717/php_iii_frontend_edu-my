<?php
//若是要判斷陣列指定索引的值「是否為空」，可以使用 empty() 函式

$arr[0] = "";
$arr[1] = 0;
$arr[2] = false;
$arr[3] = 10;
$arr[4] = NULL;

echo '$a[0] = "" ... 是否為空?';
echo isset($arr[0])? '為空' : '不為空';
