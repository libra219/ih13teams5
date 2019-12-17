<?php
/**
 * 一括消し込み
 */
// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

session_start();

// 変数初期化
$select_data;
const DEBUG_MODE = true;
$initialize_date = date("Y-m");
$_day = '-10';
$bulk_date = $initialize_date.$_day;
$bulk_time = '23:00';
$count = null;

$bid = null;
$fee = null;
$bidfee = null;
$expensess = null;


// DB接続
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
if ($mysql->connect_error) {
    \var_dump($mysqli->connect_error);
} else {
    $mysql->set_charset('utf8');    
    echo '成功';
    
}
$sql_select = 'SELECT `issue`.`name`, `trade`,`client_id`, `issue`.`employees_id`, `ensure_id`, `car_id`, `issue`.`date`, `clearing`.`date`, `billing`.`date`,`update_date`, `abbreviation`, `purchasing`.`issue_id`, `manufacturer`, `carno`, `carname`, `modelyear`, `bid`, `bidfee`, `fee`, `expensess` ,`doc_flg` FROM `issue` LEFT OUTER JOIN `client` ON issue.client_id = client.id LEFT OUTER JOIN `purchasing` ON `issue`.`id` = `purchasing`.`issue_id` LEFT OUTER JOIN `car` ON `issue`.`car_id` = `car`.`id` LEFT OUTER JOIN `documents` ON `issue`.`id` = `documents`.`issue_id` LEFT OUTER JOIN `billing` ON `issue`.`id` = `billing`.`issue_id` LEFT OUTER JOIN `clearing` ON `issue`.`id` = `clearing`.`issue_id` WHERE `billing`.`date` IS NOT NULL AND `clearing`.`date` IS NULL AND `documents`.`doc_flg` IS NOT NULL ORDER BY `issue`.`date` DESC';
// echo $sql_select;

$int_array;
$int_sum = null;
$list_int = array(array());

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

    if ($result = $mysql->query($sql_select)) {
        while ($row = $result->fetch_assoc()) {
            $select_data[] = $row;
        }
        //  var_dump($select_data);
    }

    foreach($select_data as $array){
        $int_sum = null;
        foreach($array as $key => $value){
            // 単価
            if($key == 'issue_id'){
                $issue_id = $value;
            }
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

        $int_array[] = array($issue_id, $int_sum);
        
        
    }
    var_dump($int_array);

}else{
    echo false;
}


$emplayees_id = null;
$issue_id = null;

if($_POST['bulk_button'] == 'bulk'){

    $select_data = $_SESSION['select_array'];
    $bulk_date = $_SESSION['bulk_datetime'];

    foreach($select_data as $array){
        foreach($array as $key => $value){
            // 本来はログインしている社員のId
            if(strcmp($key, "employees_id") == 0){
                $emplayees_id = $value;
                // echo $kay;
                // echo $emplayees_id;
                
            }
            if(strcmp($key, "issue_id") == 0){
                $issue_id = $value;
                echo $key;
                echo $issue_id;
                echo '<br>';
            }
        // 本当はログインしている社員IDを入れないといけない
        }
        // $clearing_insert_sql = 'INSERT INTO `billing` (`issue_id`, `date`, `employees_id`) VALUES ('.$issue_id.',"'.$bulk_date.'",'.$emplayees_id.')';
        
        // if($result = $mysql->query($biing_insert_sql)) {
        
        // }
    }
}




$mysql->close();

include './view/bulk_clearing_input.php';