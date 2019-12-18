<?php
$select_data = array();
$array = array();
$deposit_amount = array();
$client_id = array();
$client_amount = array();
$amount = array();
$cnt=0;
$today = date("Y-m-d H:i:s");
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

$view = './view/deposit_finish.php';

// DB接続
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
if ($mysql->connect_error) {
    \var_dump($mysqli->connect_error);
} else {
    $mysql->set_charset('utf8');    
}
//入金を売掛金に反映用
$select_sql = 'SELECT `client`.`abbreviation`, `client`.`id` AS `client_id`, `client`.`amount` AS `client_amount`,
`deposit`.`id`, `deposit`.`depositday`, `deposit`.`amount` AS `deposit_amount` FROM `deposit` 
LEFT OUTER JOIN `client` ON `deposit`.`client_id` = `client`.`id` ';
for($i=0; $i<count($array); $i++){
    if($i == 0 ){
        $select_sql = $select_sql.' WHERE `deposit`.`id` = '.$array[$i];
    }else{
        $select_sql = $select_sql.' OR `deposit`.`id` = '.$array[$i];
    }
}
$select_sql = $select_sql.' ORDER BY `deposit`.`depositday` DESC ';
//var_dump($select_sql);
if ($result = $mysql->query($select_sql)) {
    while ($row = $result->fetch_assoc()) {
        $select_data[] = $row;
    }
}

foreach ($select_data as $key => $value){
    $client_id[] = $value['client_id'];
    $client_amount = $value['client_amount'];
    $deposit_amount = $value['deposit_amount'];
    $amount[] = $client_amount + $deposit_amount;
    //$update_sql = 'UPDATE `client` SET = `amount` = '.$client_amount.'';
}

for($i=0;$i<count($select_data); $i++){
    $update_sql = 'UPDATE `client` SET  `amount` = "'.$amount[$i].'" WHERE id = '.$client_id[$i];
    if ($result = $mysql->query($update_sql)) {
        $dep_del_sql = 'UPDATE `deposit` SET  `dep_del` = "'.$today.'" WHERE id = '.$array[$i];
        if($result_client_amount = $mysql->query($dep_del_sql)){
            $cnt++;
        }
    }
    $sql[] = $update_sql;
}
$mysql->close();

if($cnt>0){
   $view = './view/deposit_finish.php';
}

// デバック
if (DEBUG_MODE) {
    var_dump($sql);
    var_dump($update_sql);
    var_dump($client_id);
    var_dump($dep_del_sql);
    //var_dump($deposit_amount);
    //var_dump($select_data);
    //var_dump($amount);
    // var_dump($cnt);
    // var_dump($select_sql);
}


include $view;