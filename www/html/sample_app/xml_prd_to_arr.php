<?php
//-------------------------------------------------------------
// XMLから商品名、商品画像URLを抜き出して連想配列に格納する。
//-------------------------------------------------------------
function xml_prd_to_arr($dom){

	//配列の初期化
	$array=[];

	//----------------
	//statusを取得
	//----------------
	$statusList = $dom->getElementsByTagName('GetMatchingProductForIdResult');

	//入力した分ループ処理
	for ($i=0; $i<$statusList->length; $i++){

		//パスを設定
		$root = $dom->getElementsByTagName('GetMatchingProductForIdResult')->item($i);

		//ASIN
		$node = $root->getElementsByTagName("ASIN")->item(0);
		if (! $node == NULL ){
			$ASIN = $root->getElementsByTagName("ASIN")->item(0)->nodeValue;
		}else{
			$ASIN = '';
		}

		//ASINが取得できたら処理
		if ( $ASIN ){

			//商品情報を取得
			$node = $root->getElementsByTagName("AttributeSets")->item(0);
			if (! $node == NULL ){
				
				//パスを設定
				$rt2 = $root->getElementsByTagName("AttributeSets")->item(0);
			
				//商品画像
				$node = $rt2->getElementsByTagName("URL")->item(0);
				if (! $node == NULL ){
					$URL = $rt2->getElementsByTagName("URL")->item(0)->nodeValue;
				}else{
					$URL = '';
				}	
				
				//商品名
				$node = $rt2->getElementsByTagName("Title")->item(0);
				if (! is_null($node) ){
					$Title = $rt2->getElementsByTagName("Title")->item(0)->nodeValue;
					var_dump($Title);
					echo "<br>";
					echo "----------------------------------------------------------";
					echo "<br>";
					var_dump($rt2);
					echo "<br>";
					echo "----------------------------------------------------------";
					echo "<br>";
				}else{
					$Title = '';
				}	
				
				//連想配列に格納
				$array["$ASIN"] = array("URL"=>$URL, "Title"=>$Title);
				
				//デバッグ用
				echo "SUCCESS ASIN:" . $ASIN . "<br>";
			
			}
		}else{
			//デバッグ用
			echo "ERROR ASIN:" . $ASIN . "<br>";
		}
	}
	//作成した連想配列を戻す。
	return($array);
}
?>