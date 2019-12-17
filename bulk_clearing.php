<?php
/**
 * 一括消し込み
 */
// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

session_start();

// 社員ID格納
$_SESSION['id'] = 1;

// 変数初期化
$select_data;
$select_data_client;
const DEBUG_MODE = true;
// 入力日 年　月
$initialize_date = date("Y-m");
$_day = '-10';
$bulk_date = $initialize_date.$_day;
$bulk_time = '23:00';
$count = 0;


$bid = null;
$fee = null;
$bidfee = null;
$expensess = null;
$amount = null;
$client_id = null;
$issue_id = null;
$billing = 0;


// DB接続
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
if ($mysql->connect_error) {
    \var_dump($mysqli->connect_error);
} else {
    $mysql->set_charset('utf8');    
    // echo '成功';
    
}

$int_array = array();
$int_sum = null;
$list_int = array();

if($_POST['confirm_button'] == 'confirm'){
  
    // 入力された消し込み締め日
    $bulk_date = $_POST["bulk_date"];
    $bulk_time = $_POST["bulk_time"];

    $_SESSION['bulk_date'] = $bulk_date;
    $_SESSION['bulk_time'] = $bulk_time;
    $_SESSION['bulk_datetime'] = $bulk_date.' '.$bulk_time;
    
    $defult_date = date( "Y-m", strtotime($bulk_date) );

    //当月の固定の入金締め日 処理時間
    $defult_date = $defult_date.'-10 23:00:00';

    $str = 'amount';
    // 請求済みで消し込み可能なデータ取得
    $sql_select = 'SELECT `issue`.`name`, `trade`,`client_id`, `issue`.`employees_id`, `ensure_id`, `car_id`, `issue`.`date`, `clearing`.`date`, `billing`.`date`,`update_date`, `abbreviation`, `purchasing`.`issue_id`, `manufacturer`, `carno`, `carname`, `modelyear`, `bid`, `bidfee`, `fee`, `expensess` ,`doc_flg`, '.$str.' FROM `issue` LEFT OUTER JOIN `client` ON issue.client_id = client.id LEFT OUTER JOIN `purchasing` ON `issue`.`id` = `purchasing`.`issue_id` LEFT OUTER JOIN `car` ON `issue`.`car_id` = `car`.`id` LEFT OUTER JOIN `documents` ON `issue`.`id` = `documents`.`issue_id` LEFT OUTER JOIN `billing` ON `issue`.`id` = `billing`.`issue_id` LEFT OUTER JOIN `clearing` ON `issue`.`id` = `clearing`.`issue_id` WHERE `billing`.`date` IS NOT NULL AND `clearing`.`date` IS NULL AND `documents`.`doc_flg` IS NOT NULL ORDER BY `issue`.`date` DESC';
    // echo $sql_select;
    


    if ($result = $mysql->query($sql_select)) {
        while ($row = $result->fetch_assoc()) {
            $select_data[] = $row;
            // echo '成功';
        }
        //  var_dump($select_data);
        $_SESSION['select_data'] = $select_data;

    }
    
    
    foreach($select_data as $array){
        $int_sum = null;
        foreach($array as $key => $value){
            // 顧客ID
            if($key == 'client_id'){
                $client_id = $value;
            }
            // 顧客残高
            if($key == 'amount'){
                $amount = $value;
            }
            // 案件ID
            if(strcmp($key, "issue_id") == 0){
                $issue_id = $value;
            }
            // 単価
            if($key == 'bid'){
                // echo $key.$value;
                $int_sum += intval($value);
            }
            // 落札手数料
            if($key == 'bidfee'){
                // echo $key.$value;
                $bidfee += intval($value); 
            }
            // 手数料
            if($key == 'fee'){
                // echo $key.$value;
                $int_sum += intval($value);
            }
            // 諸費用
            if($key == 'expensess'){
                // echo $key.$value;
                $int_sum += intval($value);
            }
        }

         $int_array += array($count =>array('issue_id' => $issue_id,'client_id' => $client_id, 'all_billing' => $int_sum, 'amount' => $amount));
        $count++;
    }
    // var_dump($int_array);
    
   
    //初期化    
    $count =0;

    // 繰越件数
    $carry_over_number = 0;
    // 消し込み件数
    $clearing_number = 0;

    // 顧客の残高と請求金額を比較して 繰越件数と消込件数を取得
    foreach($int_array as $array){
        
        $amount = intval($array['amount']);
        $billing = intval($array['all_billing']);
        $issue_id = $array['issue_id'];

        // 繰越か消し込み可能か
        switch($amount){
            case 0:
                // echo '失敗　null';
                $carry_over_number++;
            break;
            case $amount == $billing:
                $clearing_number++;
                // echo '同額 消し込み可能';
            break;
            case $amount > $billing:
                $clearing_number++;
                echo '残高の方が多い';
            break;
            case $amount < $billing:
                $carry_over_number++;
                // echo '請求の方が多い';
            break;
        }
    }

    // 件数格納
    $_SESSION['carr_over'] = $carry_over_number; 
    $_SESSION['clearing'] = $clearing_number;
    
    $_SESSION['select_array'] = $int_array;

   
}else{
    echo false;
}


$emplayees_id = null;

// $int_ararry array($count =>array('issue_id' => $issue_id,'client_id' => $client_id, 'all_billing' => $int_sum, 'amount' => $amount));


// 一括処理ボタン
if($_POST['bulk_button'] == 'bulk'){

    $select_array = array();
    // 社員ID
    $emplayees_id = $_SESSION['id'];

    $select_array = $_SESSION['select_array'];
    var_dump($_POST);

    // 一括処理日
    $bulk_date = $_SESSION['bulk_datetime'];

    foreach($select_array as $array){
        
        // 案件ID取得
        $issue_id = $array['issue_id'];

        // clearing INSERTO 社員ID 案件ID 消し込み処理日
        $clearing_insert_sql = 'INSERT INTO `clearing`(`employees_id`, `issue_id`, `date`) VALUES ('.$emplayees_id.','.$issue_id.',"'.$bulk_date.'")';
        // echo $clearing_insert_sql;
        
        if($result = $mysql->query($clearing_insert_sql)) {
            // var_dump($result);
        }

        // UPDATE　残高amount　顧客指定　client_id
        $billing = intval($array['all_billing']);
        $client_id = $array['client_id'];

        $client_update_sql = 'UPDATE `client` SET `amount`=amount- '.$billing.' WHERE id = '.$client_id.'';
        echo $client_update_sql;

        // if($result = $mysql->query($client_update_sql)) {
        // var_dump($result);
        // }
         

    }


 
       
    
}

$mysql->close();

include './view/bulk_clearing_input.php';