<?php
//--------------------------------------------
// XMLから商品名、画像URLを抜き出してDBに格納
//--------------------------------------------
function add_prd_to_db($input_asin){

	//商品名、画像URL取得からDBに格納するまでのタイムを計測
	$time_start = microtime(true);

	//関数の読み込み
	require_once 'common.php';
	require_once 'xml_prd_to_arr.php';
	
	//DBに接続
	$pdo = connect();

	//--------------------------------------
	//商品名、画像URLのXMLを取得
	//--------------------------------------
	require 'GetMatchingProductForIdSample.php';
	
	//--------------------------------------
	//XMLから商品名、画像URLを連想配列に格納
	//--------------------------------------
	$array=[];//初期化
	$array=xml_prd_to_arr($dom);

	//--------------------------------------
	//DBに格納
	//--------------------------------------
	foreach($array as $key=>$value){
	
		//ASIN
		$ASIN = $key;
		
		//商品画像
		$URL = $array[$key]['URL'];
		
		//商品名
		$Title = $array[$key]['Title'];
		
		//特殊文字を置換しないとDBに登録されない
		$Title = str_replace(array("'"), "\'", $Title);
		
		//  echo "<br>";
		//   echo "ASIN---";
		//   echo $ASIN;
		//   echo "<br>";
		//   var_dump($ASIN);
		//   echo "<br>";
		//   echo "URL---";
		//   echo $URL;
		//   echo "<br>";
		//   var_dump($URL);
		//   echo "<br>";
		//   echo "Title---";
		//   echo $Title;
		//   echo "<br>";
		//   var_dump($Title);
		//   echo "<br>";

		//DBにASINが無ければ新規追加。有れば各項目を更新。
		// $pdo->query("INSERT INTO asins (ASIN,URL,Title) VALUES
		// 	 ('$ASIN','$URL','$Title') ON DUPLICATE KEY
		// 	 	 UPDATE URL='$URL', Title='$Title'");

		$tes = $pdo->query("INSERT INTO asins (ASIN,URL,Title) VALUES('$ASIN','$URL','$Title') ON DUPLICATE KEY UPDATE URL='$URL', Title='$Title'");
		echo "---tes-------";
		var_dump($tes);
		echo "<br>";
	}
	
	//商品名、画像URL取得からDBに格納するまでのタイムを計測
	$time = microtime(true) - $time_start;
	echo "商品名、画像URL取得からDBに格納するまでのタイム：{$time} 秒<br>";
}
?>