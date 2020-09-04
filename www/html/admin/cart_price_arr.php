<?php
//--------------------------------------
// phpで結果を取得して連想配列に格納する。
//--------------------------------------

//----------------
//statusを取得
//----------------
$statusList = $dom->getElementsByTagName('GetCompetitivePricingForASINResult');

//入力した分ループ処理
for ($i=0; $i<$statusList->length; $i++){
	
	//ASIN
	if ($dom->getElementsByTagName("ASIN")->item($i)){
		$ASIN = $dom->getElementsByTagName("ASIN")->item($i)->nodeValue;
	}else{
		$ASIN = '';	
	}

	//商品情報を取得
	$root = $dom->getElementsByTagName("CompetitivePricing")->item($i);
	
	//カート価格
	if ($root->getElementsByTagName("LandedPrice")->item(0)){
		$tmpval = $root->getElementsByTagName("LandedPrice")->item(0);
		$LandedPrice = $tmpval->getElementsByTagName("Amount")->item(0)->nodeValue;
	}else{
		$LandedPrice = '';
	}	
	
	//連想配列に格納
	$array["$ASIN"] = array("LandedPrice"=>$LandedPrice);
}
?>