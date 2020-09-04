<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>GetMatchingProductForId 実行結果</title>
</head>
<body>
<h1>GetMatchingProductForId 実行結果</h1>
<table border="1">
<tr><th>Status</th
><th>ASIN</th>
<th>商品画像</th>
<th>商品名</th>
<th>バインディング</th>
<th>ブランド</th>
<th>アダルト</th>
<th>商標名</th>
<th>参考価格</th>
<th>生産国</th>
<th>メーカー名</th>
<th>高さ</th>
<th>長さ</th>
<th>幅</th>
<th>重さ</th>
<th>数量</th>
<th>ProductGroup</th>
<th>Publisher</th>
<th>Scent</th>
<th>Studio</th>
</tr>

<tr><th>Status</th
><th>ASIN</th>
<th>URL</th>
<th>Title</th>
<th>Binding</th>
<th>Brand</th>
<th>IsAdultProduct</th>
<th>Label</th>
<th>Amount</th>
<th>CurrencyCode</th>
<th>Manufacturer</th>
<th>Height</th>
<th>Length</th>
<th>Width</th>
<th>Weight</th>
<th>PackageQuantity</th>
<th>ProductGroup</th>
<th>Publisher</th>
<th>Scent</th>
<th>Studio</th>
</tr>

<?php
//--------------------------------------
// phpで結果を取得して表示する。ここから
//--------------------------------------

//----------------
//statusを取得
//----------------
$statusList = $dom->getElementsByTagName('GetMatchingProductForIdResult');


for ($i=0; $i<$statusList->length; $i++){
	echo "<tr>";

	//status
	if ($dom->getElementsByTagName("GetMatchingProductForIdResult")->item(0)){
		echo "<td>" . $dom->getElementsByTagName("GetMatchingProductForIdResult")->item(0)->getAttribute('status') . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//ASIN
	if ($dom->getElementsByTagName("ASIN")->item(0)){
		echo "<td>" . $dom->getElementsByTagName("ASIN")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	

	//商品情報を取得
	$root = $dom->getElementsByTagName("AttributeSets")->item($i);
	
	//商品画像
	if ($root->getElementsByTagName("URL")->item(0)){
		$image_path =$root->getElementsByTagName("URL")->item(0)->nodeValue;
		echo "<td>" . "<img src=$image_path />" . "</td>";
	}else{
		echo "<td>-</td>";//該当なし
	}	

	//商品名
	if ($root->getElementsByTagName("Title")->item(0)){
		echo "<td>" . $root->getElementsByTagName("Title")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//バインディング
	if ($root->getElementsByTagName("Binding")->item(0)){
		echo "<td>" . $root->getElementsByTagName("Binding")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//ブランド
	if ($root->getElementsByTagName("Brand")->item(0)){
		echo "<td>" . $root->getElementsByTagName("Brand")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//アダルト
	if ($root->getElementsByTagName("IsAdultProduct")->item(0)){
		echo "<td>" . $root->getElementsByTagName("IsAdultProduct")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//商標名
	if ($root->getElementsByTagName("Label")->item(0)){
		echo "<td>" . $root->getElementsByTagName("Label")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//参考価格
	if ($root->getElementsByTagName("Amount")->item(0)){
		echo "<td>" . $root->getElementsByTagName("Amount")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//生産国
	if ($root->getElementsByTagName("CurrencyCode")->item(0)){
		echo "<td>" . $root->getElementsByTagName("CurrencyCode")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//メーカー名
	if ($root->getElementsByTagName("Manufacturer")->item(0)){
		echo "<td>" . $root->getElementsByTagName("Manufacturer")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//高さ（インチからセンチに変換）
	if ($root->getElementsByTagName("Height")->item(0)){
		$tmpval = $root->getElementsByTagName("Height")->item(0)->nodeValue;
		echo "<td>" . floor($tmpval*2.54) . "㎝</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//長さ（インチからセンチに変換）
	if ($root->getElementsByTagName("Length")->item(0)){
		$tmpval = $root->getElementsByTagName("Length")->item(0)->nodeValue;
		echo "<td>" . floor($tmpval*2.54) . "㎝</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//幅（インチからセンチに変換）
	if ($root->getElementsByTagName("Width")->item(0)){
		$tmpval = $root->getElementsByTagName("Width")->item(0)->nodeValue;
		echo "<td>" . floor($tmpval*2.54) . "㎝</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}	
	
	//重さ(ポンドからグラムに変換)
	if ($root->getElementsByTagName("Weight")->item(0)){
		$tmpval = $root->getElementsByTagName("Weight")->item(0)->nodeValue;
		echo "<td>" . floor($tmpval*453.592) . "g</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}

	//数量
	if ($root->getElementsByTagName("PackageQuantity")->item(0)){
		echo "<td>" . $root->getElementsByTagName("PackageQuantity")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}		

	//ProductGroup
	if ($root->getElementsByTagName("ProductGroup")->item(0)){
		echo "<td>" . $root->getElementsByTagName("ProductGroup")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}		

	//Publisher
	if ($root->getElementsByTagName("Publisher")->item(0)){
		echo "<td>" . $root->getElementsByTagName("Publisher")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}		

	//Scent
	if ($root->getElementsByTagName("Scent")->item(0)){
		echo "<td>" . $root->getElementsByTagName("Scent")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}		

	//Studio
	if ($root->getElementsByTagName("Studio")->item(0)){
		echo "<td>" . $root->getElementsByTagName("Studio")->item(0)->nodeValue . "</td>";	
	}else{
		echo "<td>-</td>";//該当なし
	}		

	echo "</tr>";

}


//--------------------------------------
// phpで結果を取得して表示する。ここまで
//--------------------------------------
?>
</table>
</body>
</html>