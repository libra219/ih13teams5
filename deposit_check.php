<?php
$select_data = array();
$array = array();
if(!empty($_GET['id'])){
    foreach($_GET['id'] as $id){
        $array[] = $id;
    }
}



// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

// 変数初期化
$select_data;
const DEBUG_MODE = true;

// DB接続
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
if ($mysql->connect_error) {
    \var_dump($mysqli->connect_error);
} else {
    $mysql->set_charset('utf8');    
}

//売掛金消込用
$select_sql = 'SELECT `client`.`abbreviation`, `deposit`.`id`, `deposit`.`depositday`, `deposit`.`amount` FROM `deposit` 
LEFT OUTER JOIN `client` ON `deposit`.`client_id` = `client`.`id` ';
for($i=0; $i<count($array); $i++){
    if($i == 0 ){
        $select_sql = $select_sql.' WHERE `deposit`.`id` = '.$array[$i];
    }else{
        $select_sql = $select_sql.' OR `deposit`.`id` = '.$array[$i];
    }
}
$select_sql = $select_sql.' ORDER BY `deposit`.`depositday` DESC ';
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


include './view/deposit_check.php';