<?php
namespace ih13teams5;
\session_start();

// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

// 変数初期化
const DEBUG_MODE = true;
$get = new GetState();
$get_data;
$alert_msg;

$credit = 10000000;


// 企業情報の取得












// Get入力チェック処理
if ($get->RawDataGet()){
    echo '値あり';
    $get_data = $get->arrayhtml($get->RawDataGet());

    // 未入力チェック(今回要らないけど作っちゃった)
    if (empty($get_data['title']) &&
        empty($get_data['company_name']) &&
        empty($get_data['rep_name']) &&
        empty($get_data['cont_name']) &&
        empty($get_data['tel']) &&
        empty($get_data['mail']) &&
        empty($get_data['pref_name']) &&
        empty($get_data['address']) &&
        empty($get_data['budget'])
    ) {
        $alert_msg['input_empty'] = '顧客情報と予算は必須項目です';
    }else {
        $_SESSION['get_data'] = $get_data;
        header( 'Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/case_check.php' ) ;
        exit ;
    }
}



 if (DEBUG_MODE) {
     \var_dump($alert_msg);
     var_dump($get_data);
     \var_dump('http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/case_check.php');
 }


include './view/case_input.php';