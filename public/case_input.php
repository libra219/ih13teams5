<?php
namespace ih13teams5;

// 関数読み込み
require_once './../src/func.php';

// 変数初期化

$get = new GetState();

// Get入力チェック処理
if ($get->RawDataGet()){
    echo '値あり';
}

var_dump($get->RawDataGet());


include './../view/case_input.php';