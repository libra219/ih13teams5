<?php

\session_start();

// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

// 変数初期化
const DEBUG_MODE = false;
$get = new ih13teams5\GetState();
$get_data = $get->RawDataGet();
$select_data;

// Get入力チェック処理
if (empty($get_data['del_id'])){
    
    header( 'Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/case_list.php' ) ;
    exit ;
}else{
    // DB接続
    $mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
    if ($mysql->connect_error) {
        \var_dump($mysqli->connect_error);
    } else {
        $mysql->set_charset('utf8');    
    }

    $select_sql = "SELECT `id`, `name`
    FROM `issue`  
    WHERE id = '".$get_data['del_id']."' ";

    if ($result = $mysql->query($select_sql)) {
        while ($row = $result->fetch_assoc()) {
            $select_data = $row;
        }
    }


    if (!empty($get_data['submit'])) {
        $update_sql = "UPDATE `issue` SET `date` = NULL WHERE `issue`.`id` = ".$get_data['submit']." ";
        $res = $mysql->query($update_sql);
        if (!$res) {error_log($mysqli->error);}
        else {
            header( 'Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/case_list.php' ) ;
            exit ;
        }
    }
    
    $mysql->close();

    
}

if (DEBUG_MODE) {
    var_dump($get_data['del_id'],$select_data);
}


include './view/case_del.php';