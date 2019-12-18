<?php

session_start();

// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

// 変数初期化
const DEBUG_MODE = false;
$get_data;
$raw_get = new ih13teams5\GetState();
$submit = $raw_get->Get("submit");

$credit = 10000000;

//社員ID（今は固定）
$employees_id = 1;
$remarks = "";
$client_id = 0;
$car_id = 0;
$jump = "no";

$get_data = $raw_get->RawDataGet();

$select_data = $_SESSION['stocking_data'];

// 書類登録完了ならDBの日付、登録されてなくてチェックが入ってれば今日の日付を入れる。
$get_data['biddoc'] = (!empty($select_data['biddoc'])) ? $select_data['biddoc'] : (!empty($get_data['biddoc'])) ? date('Y-m-d') : $select_data['biddoc'] ;
$get_data['inspeciondoc'] = (!empty($select_data['inspeciondoc'])) ? $select_data['inspeciondoc'] : (!empty($get_data['inspeciondoc'])) ? date('Y-m-d') : $select_data['inspeciondoc'] ;
$get_data['liabilityinsu'] = (!empty($select_data['liabilityinsu'])) ? $select_data['liabilityinsu'] : (!empty($get_data['liabilityinsu'])) ? date('Y-m-d') : $select_data['liabilityinsu'] ;
$get_data['taxcert'] = (!empty($select_data['taxcert'])) ? $select_data['taxcert'] : (!empty($get_data['taxcert'])) ? date('Y-m-d') : $select_data['taxcert'] ;
$get_data['sealcert'] = (!empty($select_data['sealcert'])) ? $select_data['sealcert'] : (!empty($get_data['sealcert'])) ? date('Y-m-d') : $select_data['sealcert'] ;
$get_data['warrant'] = (!empty($select_data['warrant'])) ? $select_data['warrant'] : (!empty($get_data['warrant'])) ? date('Y-m-d') : $select_data['warrant'] ;

$get_data['bid'] = (!empty($select_data['bid'])) ? $select_data['bid'] : (empty($get_data['bid'])) ? $get_data['bid'] : $get_data['bid'] ;
$get_data['bidfee'] = (!empty($select_data['bidfee'])) ? $select_data['bidfee'] : (empty($get_data['bidfee'])) ? $get_data['bidfee'] : $get_data['bidfee'] ;
$get_data['fee'] = (!empty($select_data['fee'])) ? $select_data['fee'] : (empty($get_data['fee'])) ? $get_data['fee'] : $get_data['fee'] ;
$get_data['expensess'] = (!empty($select_data['expensess'])) ? $select_data['expensess'] : (empty($get_data['expensess'])) ? $get_data['expensess'] : $get_data['expensess'] ;
$get_data['supplier'] = (!empty($select_data['supplier'])) ? $select_data['supplier'] : (empty($get_data['supplier'])) ? $get_data['supplier'] : $get_data['supplier'] ;
$get_data['getdate'] = (!empty($select_data['getdate'])) ? $select_data['getdate'] : (empty($get_data['getdate'])) ? $get_data['getdate'] : $get_data['getdate'] ;


// 本来なら書類全部あればフラグ立てるが、テストなので全件入ってる前提
$flg = 1;


if (!empty($get_data) && !empty($submit) ) {

    // DB接続
    $mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
    if ($mysql->connect_error) {
        \var_dump($mysql->connect_error);
    } else {
        $mysql->set_charset('utf8');    
    }

    if ($select_data['car_id']) {
        // 車輌情報更新
        $update_sql = "UPDATE `car` 
        SET `carno`=?,`carname`=? ,`manufacturer`=?,`modelyear`=?,`mileage`=?,`color`=?,`transmission`=?,`restration`=?,`inspection`= ?
        WHERE id = ?";
        

        if($stmt = $mysql->prepare($update_sql)){
            $stmt->bind_param('sssiissssi'
            ,$get_data['vehicle_model']
            ,$get_data['vehicle_name']
            ,$get_data['manufacturer']
            ,$get_data['vehicle_year']
            ,$get_data['mileage']
            ,$get_data['vehicle_color']
            ,$get_data['transmission']
            ,$get_data['restration']
            ,$get_data['inspection']
            ,$select_data['car_id'] );
            if($stmt->execute()){
                $jump = 'ok';
                
            }
            // ステートメントの終了
            $stmt->close();
        }
    }

    if ($select_data['documents_id']) {
        // 書類情報更新
        $update_sql = "UPDATE `documents`
    SET `biddoc`=?,`biddoc_end`=?,`inspeciondoc`=?,`inspeciondoc_end`=?,`liabilityinsu`=?,`liabilityinsu_end`=?,`taxcert`=?,`taxcert_end`=?,`sealcert`=?,`sealcert_end`=?,`warrant`=?,`warrant_end`=?, ,`doc_flg`=? 
    WHERE id = ?";
        
        if($stmt = $mysql->prepare($update_sql)){
            $stmt->bind_param('ssssssssssssii'
            ,$get_data['biddoc']
            ,$get_data['biddoc_end']
            ,$get_data['inspeciondoc']
            ,$get_data['inspeciondoc_end']
            ,$get_data['liabilityinsu']
            ,$get_data['liabilityinsu_end']
            ,$get_data['taxcert']
            ,$get_data['taxcert_end']
            ,$get_data['sealcert']
            ,$get_data['sealcert_end']
            ,$get_data['warrant']
            ,$get_data['warrant_end']
            ,$flg
            ,$select_data['documents_id'] );
            if($stmt->execute()){
                $jump = 'ok';
            }
            // ステートメントの終了
            $stmt->close();
        }
    }
    

    if ($select_data['purchasing_id']) {
        $update_sql = "UPDATE `purchasing` 
        SET `bid` = ? ,`bidfee`= ?,`fee`= ?,`expensess`= ?,`supplier`= ?,`getdate`= ? 
        WHERE `purchasing`.`id` = ?;";
        

        if($stmt = $mysql->prepare($update_sql)){
            $stmt->bind_param('iiiissi'
            ,$get_data['bid']
            ,$get_data['bidfee']
            ,$get_data['fee']
            ,$get_data['expensess']
            ,$get_data['supplier']
            ,$get_data['getdate']
            ,$select_data['purchasing_id'] );
            if($stmt->execute()){
                $jump = 'ok';
            }
            // ステートメントの終了
            $stmt->close();
        }
    }
            



    $mysql->close();
}

if ($jump == "ok") {
    header( 'Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/stocking_input.php?select='.$select_data['purchasing_id'] ) ;
    exit ;
}

if (DEBUG_MODE) {
    echo "s";
    var_dump($select_data);
    echo "g";
    var_dump($get_data);
}


include './view/stocking_check.php';