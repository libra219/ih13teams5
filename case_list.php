<?php


// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

// 変数初期化
$select_data;
const DEBUG_MODE = false;


// DB接続
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
if ($mysql->connect_error) {
    \var_dump($mysqli->connect_error);
} else {
    $mysql->set_charset('utf8');    
}

$select_sql = 'SELECT `id`, `name`, `trade`, `client_id`, `employees_id`, `ensure_id`, `car_id`, `date`, `update_date` 
FROM `issue` 
ORDER BY date DESC ';

if ($result = $mysql->query($select_sql)) {
    while ($row = $result->fetch_assoc()) {
        $select_data[] = $row;
    }
}

$mysql->close();


// デバック
if (DEBUG_MODE) {
    var_dump($select_data);
    
}


include './view/case_list.php';
