<?php
//-------------------------------------------------------------
// XMLからカート価格を抜き出して連想配列に格納する。
//-------------------------------------------------------------
function xml_prc_to_arr($dom){

	//配列の初期化
	$array=[];

	//----------------
	//statusを取得
	//----------------
	$statusList = $dom->getElementsByTagName('GetCompetitivePricingForASINResult');

	//入力した分ループ処理
	for ($i=0; $i<$statusList->length; $i++){

		//パスを設定
		$root = $dom->getElementsByTagName('GetCompetitivePricingForASINResult')->item($i);

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
			$node = $root->getElementsByTagName("CompetitivePricing")->item(0);
			if (! $node == NULL ){
				
				//パスを設定
				$rt2 = $root->getElementsByTagName("CompetitivePricing")->item(0);
				
				//カート価格
				$node = $rt2->getElementsByTagName("LandedPrice")->item(0);
				if (! is_null($node)){
					$rt3 = $rt2->getElementsByTagName("LandedPrice")->item(0);
					$LandedPrice = $rt3->getElementsByTagName("Amount")->item(0)->nodeValue;
				}else{
					$LandedPrice = '0';
				}
				
				//連想配列に格納
				$array["$ASIN"] = array("LandedPrice"=>$LandedPrice);
				
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