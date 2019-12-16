<?php
$select_data = array();

$array = array();
foreach($_GET['id'] as $id){
    $array[] = $id;
}
$employee = '1';
$today = date("Y-m-d H:i:s");
$cnt=0;
// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

// 変数初期化
$select_data;
const DEBUG_MODE = true;

$view = './sales.php';

// DB接続
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
if ($mysql->connect_error) {
    \var_dump($mysqli->connect_error);
} else {
    $mysql->set_charset('utf8');    
}
for($i=0;$i<count($array); $i++){
    $select_sql = 'INSERT INTO `billing`(employees_id,issue_id, date) VALUES ("'.$employee.'", "'.$array[$i].'", "'.$today.'")';
    if ($result = $mysql->query($select_sql)) {
        $cnt++;
    }
}
$mysql->close();

if($cnt>0){
   $view = './view/sales_finish.php';
}

// デバック
if (DEBUG_MODE) {
    var_dump($select_data);
    var_dump($cnt);
    var_dump($select_sql);
}


include $view;