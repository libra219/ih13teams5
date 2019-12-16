<?php


// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

// 変数初期化
$select_data;
const DEBUG_MODE = true;
$select_data = array();

// DB接続
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
if ($mysql->connect_error) {
    \var_dump($mysqli->connect_error);
} else {
    $mysql->set_charset('utf8');    
}

$select_sql = 'SELECT `issue`.`name`, `trade`,`client_id`, `issue`.`employees_id`, `ensure_id`, 
`car_id`, `clearing`.`date`, `billing`.`date`, `issue`.`date`, `update_date`, `abbreviation`,`purchasing`.`issue_id`, 
`manufacturer`, `carno`, `carname`, `modelyear`, `bid`, `bidfee`, `fee`, `expensess` ,`doc_flg` 
FROM `issue` LEFT OUTER JOIN `client` ON issue.client_id = client.id 
LEFT OUTER JOIN `purchasing` ON `issue`.`id` = `purchasing`.`issue_id` 
LEFT OUTER JOIN `car` ON `issue`.`car_id` = `car`.`id` 
LEFT OUTER JOIN `documents` ON `issue`.`id` = `documents`.`issue_id` 
LEFT OUTER JOIN `billing` ON `issue`.`id` = `billing`.`issue_id` 
LEFT OUTER JOIN `clearing` ON `issue`.`id` = `clearing`.`issue_id`
WHERE `purchasing`.`issue_id` IS NOT NULL AND `documents`.`doc_flg` 
IS NOT NULL AND `clearing`.`date` IS NULL AND `billing`.`date` 
IS NULL AND `documents`.`doc_flg` IS NOT NULL ORDER BY `issue`.`date` DESC';

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


include './view/sales.php';