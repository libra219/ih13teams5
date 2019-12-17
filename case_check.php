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

$credit = 100000000;

$date = date('Y-m-d');

//社員ID（今は固定）
$employees_id = 1;
$client_id = 0;
$car_id = 0;
$jump = "no";

$get_data = $_SESSION['get_data'];



if (!empty($get_data) && !empty($submit)) {

    // DB接続
    $mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
    if ($mysql->connect_error) {
        \var_dump($mysql->connect_error);
    } else {
        $mysql->set_charset('utf8');    
    }

    $bind['company_name'] = $get_data['company_name'];

    // 企業情報取得
    $client_sql = "SELECT id FROM `client` WHERE `company` LIKE ?";
    if ($stmt = $mysql->prepare($client_sql)) {
        
        $bind['company_name'] = '%'.$bind['company_name'] .'%';

        $stmt->bind_param('s', $bind['company_name']);
        // 取得結果を変数にバインドする
        $stmt->bind_result($id);
        if($stmt->execute()){
            while ($stmt->fetch()) {
                $client_id = $id;
            }
        }    
        // ステートメントの終了
        $stmt->close();
    }

    
    // なければ企業情報の登録
    if ($client_id == 0) {
        $insert_sql = 'INSERT INTO `client`(`company`, `abbreviation`, `president`, `name`, `zip`, `address`, `tel`, `mail`, `credit`) 
        VALUES(?,?,?,?,?,?,?,?,?)';

        $address = $get_data['pref_name'].$get_data['address'];

        if($stmt = $mysql->prepare($insert_sql)){
            $stmt->bind_param('ssssssssi'
            , $get_data['company_name']
            ,$get_data['abbreviation']
            ,$get_data['rep_name']
            ,$get_data['cont_name']
            ,$get_data['zip']
            ,$address
            ,$get_data['tel']
            ,$get_data['mail']
            ,$credit );
            if($stmt->execute()){
                
            }
            // ステートメントの終了
            $stmt->close();
        }

        $get_id_sql = "SELECT LAST_INSERT_ID()";

        if ($result = $mysql->query($get_id_sql)){
            while ($row = $result->fetch_assoc()) {
                $client_id = $row['LAST_INSERT_ID()'];
            }
        }
    }

    // 車両情報取得
    $bind['vehicle_model'] = $get_data['vehicle_model'];
    $client_sql = "SELECT id FROM `car` WHERE `carno` LIKE ?";
    if ($stmt = $mysql->prepare($client_sql)) {
        // $bind['vehicle_model'] = '%'.$bind['vehicle_model'] .'%';
        $stmt->bind_param('s', $bind['vehicle_model']);
        // 取得結果を変数にバインドする
        $stmt->bind_result($id);
        if($stmt->execute()){
            while ($stmt->fetch()) {
                $car_id = $id;
            }
        }    
        // ステートメントの終了
        $stmt->close();
    }

    if ($car_id == 0) {
        // 車輌情報登録
        $insert_sql = 'INSERT INTO `car`(`carno`, `carname`, `manufacturer`, `modelyear`, `mileage`, `color`, `transmission`) 
        VALUES(?,?,?,?,?,?,?)';

        if($stmt = $mysql->prepare($insert_sql)){
            $stmt->bind_param('sssiiss'
            ,$get_data['vehicle_model']
            ,$get_data['vehicle_name']
            ,$get_data['manufacturer']
            ,$get_data['vehicle_year']
            ,$get_data['mileage']
            ,$get_data['vehicle_color']
            ,$get_data['mission'] );
            if($stmt->execute()){
                
            }
            // ステートメントの終了
            $stmt->close();
        }
        $get_id_sql = "SELECT LAST_INSERT_ID()";

        if ($result = $mysql->query($get_id_sql)){
            while ($row = $result->fetch_assoc()) {
                $car_id = $row['LAST_INSERT_ID()'];
            }
        }
    }



    // 案件の登録
    $insert_issue_sql = "INSERT INTO `issue`(`name`, `trade`, `budget`, `remarks`, `client_id`, `employees_id`, `car_id`, `date`)
    VALUES (?,?,?,?,?,?,?,?)";

    if($stmt = $mysql->prepare($insert_issue_sql)){
        
        $stmt->bind_param('ssssiiis'
        , $get_data['title']
        ,$get_data['trade']
        ,$get_data['budget']
        ,$get_data['notices']
        ,$client_id
        ,$employees_id
        ,$car_id
        ,$date );
        if ($stmt->execute()) {

            $jump = "ok";
        }
        
        // ステートメントの終了
        $stmt->close();
    }
    $get_id_sql = "SELECT LAST_INSERT_ID()";

    if ($result = $mysql->query($get_id_sql)){
        while ($row = $result->fetch_assoc()) {
            $issue_id = $row['LAST_INSERT_ID()'];
        }
    }


    // 書類情報の登録
    if ($jump == 'ok') {
        $insert_issue_sql = "INSERT INTO `documents`(`issue_id`)
        VALUES (?)";

        if($stmt = $mysql->prepare($insert_issue_sql)){
            
            $stmt->bind_param('i'
            , $issue_id );
            if ($stmt->execute()) {

            }
            
            // ステートメントの終了
            $stmt->close();
        }
    }


    $mysql->close();
}

if ($jump == "ok") {
    header( 'Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/case_list.php' ) ;
    exit ;
}

if (DEBUG_MODE) {
    var_dump($get_data);
    var_dump($car_id);
}


include './view/case_check.php';