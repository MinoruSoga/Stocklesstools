<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>GetMatchingProductForId 実行結果</title>
</head>
<body>
<h1>GetMatchingProductForId 実行結果</h1>
<table border="1">
<tr>
    <th>Status</th>
    <th>ASIN</th>
    <th>商品画像</th>
    <th>商品名</th>
</tr>
<?php
//--------------------------------------
// phpで結果を取得して表示する。ここから
//--------------------------------------

//----------------
//statusを取得
//----------------
$statusList = $dom->getElementsByTagName('GetMatchingProductForIdResult');

//----------------
//ASINを取得
//----------------
$asinList = $dom->getElementsByTagName('ASIN');

//----------------
//商品名を取得
//----------------
$titleList=$dom->getElementsByTagNameNS('*','Title');

//----------------
//商品画像を取得
//----------------
$imageList=$dom->getElementsByTagNameNS('*', 'URL');

//---------------------------
//取得した各リストを表示する
//---------------------------
for ($i=0; $i<$titleList->length; $i++){
	echo "<tr>";
	echo "<td>" . $statusList->item($i)->getAttribute('status') . "</td>";
    echo "<td>" . $asinList->item($i)->nodeValue . "</td>";
    $image_path = $imageList->item($i)->nodeValue;
    echo "<td>" . "<img src=$image_path />" . "</td>";
	echo "<td>" . $titleList->item($i)->nodeValue . "</td>";
	echo "</tr>";
}
//--------------------------------------
// phpで結果を取得して表示する。ここまで
//--------------------------------------
?>
</table>
</body>
</html>