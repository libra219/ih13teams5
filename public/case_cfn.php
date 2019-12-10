<?php

// 定数ファイル読み込み
require_once './../src/env.php';
// 関数読み込み
require_once './../src/func.php';

// 変数初期化
$select_data;
$getState = new ih13teams5\GetState();

const DEBUG_MODE = true;


$select_id = $getState->IntGet('select');
if (!$select_id) {
    header( "Location: http://127.0.0.1:8000/public/case_list.php" ) ;
	exit ;
}


// DB接続
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
if ($mysql->connect_error) {
    \var_dump($mysqli->connect_error);
} else {
    $mysql->set_charset('utf8');    
}

$select_sql = 'SELECT `id`, `trade`, `budget`, `clearing`, `remarks`, `billing_id`, `client_id`, `employees_id`, `ensure_id`, `car_id`, `date`, `update_date` 
FROM `issue`
WHERE = ?  
ORDER BY date DESC ';

if($stmt = $mysql->prepare($select_sql)){

    $stmt->bind_param('i', $select_id);
    
    if($stmt->execute()){
        // 結果の取得
        $result = $stmt->get_result();
        
        // 結果を出力
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            
        }
    }
    // 結果セットを開放
    $result->free();
}
// ステートメントの終了
$stmt->close();

$mysql->close();









include './../view/case_cfn.php';