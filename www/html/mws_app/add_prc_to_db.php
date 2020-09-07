<?php
//----------------------------------------
// XMLからカート価格を抜き出してDBに格納
//----------------------------------------
function add_prc_to_db($input_asin){

	//カート価格取得からDBに格納するまでのタイムを計測
	$time_start = microtime(true);

	//関数の読み込み
	require_once 'common.php';
	require_once 'xml_prc_to_arr.php';

	//DBに接続
	$pdo = connect();
	
	//--------------------------------------
	//カート価格のXMLを取得
	//--------------------------------------
	require 'GetCompetitivePricingForASINSample.php';
	
	//--------------------------------------
	//XMLからカート価格を連想配列に格納
	//--------------------------------------
	$array=[];//初期化
	$array=xml_prc_to_arr($dom);
	
	//--------------------------------------
	//DBに格納
	//--------------------------------------
	foreach($array as $key=>$value){
	
		//ASIN
		$ASIN = $key;
		
		//カート価格
		$LandedPrice = $array[$key]['LandedPrice'];
		
		//DBにASINが無ければ新規追加。有れば各項目を更新。
		// $pdo->query("INSERT INTO asins (ASIN,LandedPrice) VALUES('$ASIN',$LandedPrice) ON DUPLICATE KEY UPDATE LandedPrice=\"$LandedPrice\"");
	}
	
	//カート価格取得からDBに格納するまでのタイムを計測
	$time = microtime(true) - $time_start;
	echo "カート価格取得からDBに格納するまでのタイム：{$time} 秒<br>";
}
?>