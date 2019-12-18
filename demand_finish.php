<?php
$select_data = array();
$array = array();
$client_id = array();
$client_amount = array();
$issue_id = array();
$amount = array();
$employee = '1';
$today = date("Y-m-d H:i:s");
$break=0;
$cnt=0;
foreach($_GET['id'] as $id){
    $array[] = $id;
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

$select_sql = 'SELECT `issue`.`name`, `trade`,`client_id`, `issue`.`employees_id`, `ensure_id`, 
`car_id`, `issue`.`date`, `clearing`.`date`, `billing`.`date`,`update_date`, `abbreviation`, `purchasing`.`issue_id`, 
`manufacturer`, `carno`, `carname`, `modelyear`, `bid`, `bidfee`, `fee`, `expensess` ,`doc_flg` , `client`.`amount`FROM `issue` 
LEFT OUTER JOIN `client` ON issue.client_id = client.id 
LEFT OUTER JOIN `purchasing` ON `issue`.`id` = `purchasing`.`issue_id` 
LEFT OUTER JOIN `car` ON `issue`.`car_id` = `car`.`id` 
LEFT OUTER JOIN `documents` ON `issue`.`id` = `documents`.`issue_id` 
LEFT OUTER JOIN `billing` ON `issue`.`id` = `billing`.`issue_id` 
LEFT OUTER JOIN `clearing` ON `issue`.`id` = `clearing`.`issue_id` ';
for($i=0; $i<count($array); $i++){
    if($i == 0 ){
        $select_sql = $select_sql.' WHERE `issue`.`id` = '.$array[$i];
    }else{
        $select_sql = $select_sql.' OR `issue`.`id` = '.$array[$i];
    }
}
$select_sql = $select_sql.' ORDER BY `issue`.`date` DESC';  
if ($result = $mysql->query($select_sql)) {
    while ($row = $result->fetch_assoc()) {
        $select_data[] = $row;
    }
}
foreach ($select_data as $key => $value){
    $client_id[] = $value['client_id'];
    $issue_id[] = $value['issue_id'];
    $client_amount[] = $value['amount'];
    $bid = $value['bid'];
    $bidfee = $value['bidfee'];
    $fee = $value['fee'];
    $expensess = $value['expensess'];
    $amount[] = $bid + $bidfee + $fee + $expensess;
    //$update_sql = 'UPDATE `client` SET = `amount` = '.$client_amount.'';
}

for($j=0; $j<count($select_data); $j++){
    $select_amount_sql = 'SELECT `amount` FROM `client` WHERE id = '.$client_id[$j];
    if($result_amount = $mysql->query($select_amount_sql)){
        while ($row = $result_amount->fetch_assoc()) {
            $select_amount[] = $row;
        }
    }
    if($select_amount[$j]["amount"] > $amount[$j]){
        if($amount[$j] < $client_amount[$j]){
            $update_sql = 'UPDATE `client` SET  `amount` = `amount` - "'.$amount[$j].'" WHERE id = '.$client_id[$j];
            if ($result = $mysql->query($update_sql)) {
                $insert_clearing_sql = 'INSERT INTO `clearing`(employees_id,issue_id, date) VALUES ("'.$employee.'", "'.$issue_id[$j].'", "'.$today.'")';
                if($result_crearing = $mysql->query($insert_clearing_sql)){
                    $cnt++;
                }
            }
        }
    }
   $sql[] = $update_sql;
}


$mysql->close();


// デバック
if (DEBUG_MODE) {
    // var_dump($select_data);
    // var_dump($select_sql);
    //var_dump($update_sql);
    var_dump($insert_clearing_sql);
    var_dump($amount);
    // var_dump($sql);
    var_dump($select_amount);

}


include './view/demand_finish.php';