<?php
//csvファイル選択用
$tempfile = $_FILES['filename']['tmp_name'];
$filename = './' . $_FILES['filename']['name'];
 $name = 'depo.csv';
if (is_uploaded_file($tempfile)) {
    if ( move_uploaded_file($tempfile , $filename )) {
        rename( $filename, $name );
    }
} else {

} 

$select_data = array();
$cnt=0;
$sql_cnt=0;
$array = array();
$csv_data = array();
// 定数ファイル読み込み
require_once './src/env.php';
// 関数読み込み
require_once './src/func.php';

// 変数初期化
$select_data;
const DEBUG_MODE = true;

// ファイルが存在しているかチェックする
if (($handle = fopen("./depo.csv", "r")) !== FALSE) {
    // 1行ずつfgetcsv()関数を使って読み込む
    while (($data = fgetcsv($handle))) {
        //var_dump($data);
        $csv_data[] = $data;
        foreach ($data as $value) {
            $cnt++;
        }
    }
    fclose($handle);
}
//echo count($csv_data);
for($i=0; $i<count($csv_data); $i++){
    for($j=0; $j<$cnt; $j++){
        //echo $csv_data[$i][$j];
    }
}
//DB接続
$mysql = new mysqli(HOST,USERNAME,PASSWORD,DBNAME);
if ($mysql->connect_error) {
    \var_dump($mysqli->connect_error);
} else {
    $mysql->set_charset('utf8');    
}


//顧客idと会社略称取得
$select_sql = 'SELECT `id`, `abbreviation` FROM `client` ';

for($i=0; $i<count($csv_data); $i++){
    if($i == 0 ){
        $select_sql = $select_sql.' WHERE `abbreviation` = "'.$csv_data[$i][0].'"';
    }else{
        $select_sql = $select_sql.' OR `abbreviation` = "'.$csv_data[$i][0].'"';
    }
}

if ($result = $mysql->query($select_sql)) {
    while ($row = $result->fetch_assoc()) {
        $select_data[] = $row;
    }
}

//csvからの入金確認用
for($i=0;$i<count($csv_data); $i++){
    $insert_sql = 'INSERT INTO `deposit`(id, client_id, amount, depositday, dep_del) VALUES (NULL, "'.$select_data[$i]["id"].'", "'.$csv_data[$i][1].'", "'.$csv_data[$i][2].'", NULL)';
     if ($result = $mysql->query($insert_sql)) {
         $sql_cnt++;
     }
}


$mysql->close();


$file = './depo.csv';
 
//ファイルを削除する

if (unlink($file)){
  //echo $file.'の削除に成功しました。';
}else{
  //echo $file.'の削除に失敗しました。';
}

// デバック
if (DEBUG_MODE) {
    // var_dump($select_sql);
    
    // var_dump($select_data);
    // var_dump($csv_data);
    // var_dump($sql_cnt);
    // var_dump($insert_sql);
}


include './view/deposit_choose.php';

