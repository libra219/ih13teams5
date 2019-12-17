<?php
session_start();

// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

// 変数初期化
$select_data;
$select_id;
$getState = new ih13teams5\GetState();



const DEBUG_MODE = true;


$select_id = $getState->IntGet('select');
if (!$select_id) {
    header( 'Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/case_list.php'  ) ;
	exit ;
}


// DB接続
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
if ($mysql->connect_error) {
    \var_dump($mysql->connect_error);
} else {
    $mysql->set_charset('utf8');    
}

$select_sql = "SELECT `issue`.`id` AS id,`issue`.`name` AS name, car_id,trade, budget, remarks, `car`.`carno` AS vehicle_model, `car`.`carname` AS vehicle_name, `car`.`manufacturer`, `car`.`modelyear` AS vehicle_year, `car`.`mileage` AS mileage, `car`.`color` AS vehicle_color, `car`.`transmission` AS transmission, restration, inspection, `client`.`company` , `documents`.`id` AS documents_id,`biddoc`, `biddoc_end`, `inspeciondoc`, `inspeciondoc_end`, `liabilityinsu`, `liabilityinsu_end`, `taxcert`, `taxcert_end`, `sealcert`, `sealcert_end`, `warrant`, `warrant_end`, `doc_flg`
FROM issue
INNER JOIN car ON issue.car_id = car.id 
INNER JOIN client ON issue.client_id = client.id 
INNER JOIN documents ON issue.id = documents.issue_id
WHERE issue.id = ? ";

if($stmt = $mysql->prepare($select_sql)){

    $stmt->bind_param('i', $select_id);
    
    if($stmt->execute()){
        // 結果の取得
        $result = $stmt->get_result();
        
        // 結果を出力
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $select_data = $row;
        }
        // 結果セットを開放
        $result->free();
    }
    // ステートメントの終了
    $stmt->close();
}
$mysql->close();


// DBのDate形式の時間表示を削除
$select_data['inspection'] = str_replace(' 00:00:00', '', $select_data['inspection']);
$select_data['biddoc_end'] = str_replace(' 00:00:00', '', $select_data['biddoc_end']);
$select_data['inspeciondoc_end'] = str_replace(' 00:00:00', '', $select_data['inspeciondoc_end']);
$select_data['liabilityinsu_end'] = str_replace(' 00:00:00', '', $select_data['liabilityinsu_end']);
$select_data['taxcert_end'] = str_replace(' 00:00:00', '', $select_data['taxcert_end']);
$select_data['sealcert_end'] = str_replace(' 00:00:00', '', $select_data['sealcert_end']);
$select_data['warrant_end'] = str_replace(' 00:00:00', '', $select_data['warrant_end']);

$_SESSION['select_data'] = $select_data;



// デバック
if (DEBUG_MODE) {
    var_dump($select_data);
    
}



include './view/case_cfn.php';