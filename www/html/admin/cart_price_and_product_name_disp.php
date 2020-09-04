<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>GetCompetitivePricingForASIN & GetMatchingProductForId 実行結果</title>
</head>
<body>
<h1>GetCompetitivePricingForASIN & GetMatchingProductForId 実行結果</h1>
<table border="1">
<tr><th>ASIN</th><th>商品画像</th><th>商品名</th><th>カート価格</th></tr>
<?php
////////////////////////////////////////
// phpで結果を取得して表示する。ここから
////////////////////////////////////////

//--------------------------------------
//カート価格を連想配列に格納
//--------------------------------------
require_once dirname(__FILE__) . '/GetCompetitivePricingForASINSample.php';
$cart_arr = $array;

//--------------------------------------
//商品名、画像URLを連想配列に格納
//--------------------------------------
require dirname(__FILE__) . '/GetMatchingProductForIdSample.php';
$product_arr = $array;

//--------------------------------------
//カート価格、商品名／商品画像を表示する。
//--------------------------------------
foreach($array as $key=>$value){
	echo "<tr>";
	//ASIN
	echo "<td>" . $key . "</td>";
	
	//商品画像
	$image_path = $product_arr[$key]["URL"];
	echo "<td>" . "<img src=$image_path />" . "</td>";
	
	//商品名
	echo "<td>" . $product_arr[$key]["Title"] . "</td>";

	//カート価格
	$tmpval = $cart_arr[$key]["LandedPrice"];
	echo "<td>" . floor($tmpval) . "円</td>";
	echo "</tr>";
}
////////////////////////////////////////
// phpで結果を取得して表示する。ここまで
////////////////////////////////////////
?>
</table>
</body>
</html>