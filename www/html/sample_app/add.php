<?php
//関数の読み込み
require_once 'mws_func.php';
require_once 'add_prc_to_db.php';
require_once 'add_prd_to_db.php';

//入力フォームから送信をクリックされたら処理
if(@$_POST[('submit')]){
    //全体の処理時間を計測
    $time_start = microtime(true);

    //入力フォームの値を配列に格納。
    require 'textarea_to_arr.php';

    //デバッグ/計測用
    echo "入力数（重複を除去） :" . count($array) . "件<br>";

    //初期値
    $input_asin=[]; //一時的に配列を格納
    $max_cnt = 5; //5件ごとに処理

    //入力分ループ処理
    for($i=0; $i<count($array); $i++){

        //5件分を配列に格納
        array_push($input_asin, $array[$i]);

        //5件ごとに処理を実行 || 最後の処理を実行
        if(($i+1)%$max_cnt==0 || $i==count($array)-1){

            //DBにカート価格を格納
            add_prc_to_db($input_asin);

            //DBに商品情報を格納
            add_prd_to_db($input_asin);

            //sleep(1);

            //初期化
            $input_asin=[];
        }
    }

    //全体の処理時間を計測
    $time = microtime(true) - $time_start;
    echo "全体のタイム : {$time} 秒<br>";

    //管理画面を表示
    //header('Location: index.php);
    //exit();

}
require 't_add.php';