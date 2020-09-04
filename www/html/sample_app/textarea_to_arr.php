<?php
	//改行コードを含む文字列
	$str = htmlspecialchars($_POST['asin']);
	
	//改行コードを置換してLF改行コードに統一
	$str = str_replace(array("\r\n","\r"), "\n", $str);
	
	//LF改行コードで配列に格納
	$tbl = explode("\n", $str);
	
	//配列の空要素を削除する
	$tbl = array_filter($tbl, "strlen");

	//空白を削除する。
	$array=[];
	for ($i=0; $i<count($tbl); $i++){
		$str = trim($tbl[$i]);
		//エクセルからASINをコピー時の空白を除去
		$str = str_replace( "\xc2\xa0", "", $str );
		array_push($array, $str);
	}
	//配列の重複を削除
	$tbl=array_unique($array);
	
	//キー振り直し
	$array = array_values($tbl);
?>