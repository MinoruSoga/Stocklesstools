<?php
function textarea_to_arr()
{
	//改行コードを含む文字列
	$str = htmlspecialchars($_POST['asin']);
	
	//改行コードを置換してLF改行コードに統一
	$str = str_replace(array("\r\n","\r"), "\n", $str);
	
	//LF改行コードで配列に格納
	$array = explode("\n", $str);
	
	return $array;
}
?>