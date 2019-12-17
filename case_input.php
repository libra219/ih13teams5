<?php
namespace ih13teams5;
\session_start();

// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

// 変数初期化
const DEBUG_MODE = false;
$get = new GetState();
$get_data;
$alert_msg;

$credit = 10000000;


// 企業情報の取得












// Get入力チェック処理
if ($get->RawDataGet()){
    echo '値あり';
    $get_data = $get->arrayhtml($get->RawDataGet());

    // submit押されたら遷移
    if (empty($get_data['submit']) ) {
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