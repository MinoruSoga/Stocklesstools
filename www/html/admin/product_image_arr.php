<?php
//--------------------------------------
// phpで結果を取得して連想配列に格納する。
//--------------------------------------

//----------------
//statusを取得
//----------------
$statusList = $dom->getElementsByTagName('GetMatchingProductForIdResult');

//入力した分ループ処理
for ($i=0; $i<$statusList->length; $i++){
	
	//ASIN
	if ($dom->getElementsByTagName('GetMatchingProductForIdResult')->item($i)){
		$tmp = $dom->getElementsByTagName('GetMatchingProductForIdResult')->item($i);
		$ASIN = $tmp->getElementsByTagName("ASIN")->item(0)->nodeValue;
	}else{
		$ASIN = '';	
	}

	//商品情報を取得
	$root = $dom->getElementsByTagName("AttributeSets")->item($i);
	
	//商品画像
	if ($root->getElementsByTagName("URL")->item(0)){
		$URL = $root->getElementsByTagName("URL")->item(0)->nodeValue;
	}else{
		$URL = '';
	}	

	//商品名
	if ($root->getElementsByTagName("Title")->item(0)){
		$Title = $root->getElementsByTagName("Title")->item(0)->nodeValue;
	}else{
		$Title = '';
	}	
	
	//連想配列に格納
	$array["$ASIN"] = array("URL"=>$URL, "Title"=>$Title);
}
?>