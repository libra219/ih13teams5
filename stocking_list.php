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

$select_sql = 'SELECT purchasing.id AS id, issue_id, issue.name AS name, issue.trade AS trade 
FROM purchasing INNER JOIN issue ON issue.id = purchasing.issue_id
ORDER BY id DESC ';

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

include './view/stocking_list.php';
