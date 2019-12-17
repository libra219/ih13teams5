<?php
/**
 * ・請求日付のインプット
 * ・日付を送ったらその日付に準じるデータをとってくる
 *      準じるデータは　入力日２０１９年１２月9日だったら-> 11月26日〜12月25日
 *      12月26日なら12/26日〜1月２5日
 *      26日だったら当月と来月
 *      25日だったら当月と前月
 * とってきたデータを画面に表示
 * データの確認をしてそれでよかったら請求日付をインプット。
 * 請求日付をインプットしたらインプットした請求日付を取得してインプットしたデータを再確認
 * billing table 請求
 * isuue table 案件
 *      
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
$_day = '-25';
$bulk_date = $initialize_date.$_day;
$bulk_time = '04:00';
$count = null;

// var_dump($bulk_date);
// var_dump($bulk_time);

// DB接続
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
if ($mysql->connect_error) {
    \var_dump($mysqli->connect_error);
} else {
    $mysql->set_charset('utf8');    
    echo '成功';
}

// 確認ボタンが押されたら
if($_POST['confirm_button'] == 'confirm'){
  
    // 入力された請求締め日
    $bulk_date = $_POST["bulk_date"];
    $bulk_time = $_POST["bulk_time"];
    // 日付と時間
    $_SESSION['bulk_date'] = $bulk_date;
    $_SESSION['bulk_time'] = $bulk_time;
    $_SESSION['bulk_datetime'] = $bulk_date.' '.$bulk_time;
    
    $defult_date = date( "Y-m", strtotime($bulk_date) );
    //当月の固定の請求締め日 処理時間
    $defult_date = $defult_date.'-25 4:00:00';

    // 入力された請求日が当月の25日より過去・未来  ?? <= ??月25日
    if (strtotime($bulk_date) <= strtotime($defult_date)){

        // 前月
        $before_date = date( "Y-m", strtotime( $bulk_date. " -1 month" ) );
        // 前月請求日　固定
        $before_date = $before_date.'-26';
        
        $sql_issue_debit = 'SELECT `issue`.`name`, `trade`,`client_id`, `issue`.`employees_id`, `ensure_id`, `car_id`, `issue`.`date`, `clearing`.`date`, `billing`.`date`,`update_date`, `purchasing`.`issue_id`, `manufacturer`, `carno`, `carname`, `modelyear`, `bid`, `bidfee`, `fee`, `expensess` ,`doc_flg` FROM `issue` LEFT OUTER JOIN `client` ON issue.client_id = client.id LEFT OUTER JOIN `purchasing` ON `issue`.`id` = `purchasing`.`issue_id` LEFT OUTER JOIN `car` ON `issue`.`car_id` = `car`.`id` LEFT OUTER JOIN `documents` ON `issue`.`id` = `documents`.`issue_id` LEFT OUTER JOIN `billing` ON `issue`.`id` = `billing`.`issue_id` LEFT OUTER JOIN `clearing` ON `issue`.`id` = `clearing`.`issue_id` WHERE purchasing.getdate BETWEEN "'.$before_date.'" AND "'.$bulk_date.'" AND `purchasing`.`issue_id` IS NOT NULL AND `documents`.`doc_flg` IS NOT NULL AND `clearing`.`date` IS NULL AND `billing`.`date` IS NULL ORDER BY `issue`.`date` DESC';

        if ($result = $mysql->query($sql_issue_debit)) {
            while ($row = $result->fetch_assoc()) {
                $select_data[] = $row;
            }
        }
        if(isset($select_data)){
            $_SESSION['select_array'] = $select_data; 
        }
    } 
}else{
    echo false;
}


$emplayees_id = null;
$issue_id = null;
$trabe = null;
$name = null;
$result_issue = array();

// 一括処理ボタン
if($_POST['bulk_button'] == 'bulk'){



    $select_data = $_SESSION['select_array'];
    $bulk_date = $_SESSION['bulk_datetime'];

    // var_dump($_SESSION['bulk_datetime']);
    // echo $bulk_date;

    foreach($select_data as $array){
        foreach($array as $key => $value){
            // 本来はログインしている社員のId
            if(strcmp($key, "employees_id") == 0){
                $emplayees_id = $value;
                echo $kay;
                echo $emplayees_id;
                
            }
            if(strcmp($key, "issue_id") == 0){
                $issue_id = $value;
                echo $key;
                echo $issue_id;
                echo '<br>';
            }
            
        // 本当はログインしている社員IDを入れないといけない
        }
        $biing_insert_sql = 'INSERT INTO `billing` (`issue_id`, `date`, `employees_id`) VALUES ('.$issue_id.',"'.$bulk_date.'",'.$emplayees_id.')';
        
        if($result = $mysql->query($biing_insert_sql)) {
            $count++;
        // var_dump($result);
        }
        
        
    }
    // 初期化
    $select_data = null;
}



$mysql->close();

include './view/bulk_billing_input.php';