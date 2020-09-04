<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>商品一覧</title>
</head>
<body>
<table border="1">
<div class="base">
  <a href="t_add.php">新規追加</a>
  <?php echo "合計:" . count($asins) ?>
</div>

<tr><th>商品画像</th><th>ASIN</th><th>商品名</th><th>カート価格</th><th>処理</th></tr>
  <?php $cnt=0 ?>
  <?php foreach ($asins as $g) { ?>
    <!-- <?php //if ($cnt > 30 ){break;} ?> -->
    <tr>
      <td>
        <p class="asins"><img src= <?php echo $g['URL'] ?> /></p>
      </td>
      <td>
        <p class="asins"><?php echo $g['ASIN'] ?></p>
      </td>
      <td>
        <p class="asins"><?php echo $g['Title'] ?></p>
      </td>
      <td>
        <p><?php echo $g['LandedPrice'] ?> 円</p>
      </td>
      <td>
        <p><a href="delete.php?ASIN=<?php echo $g['ASIN'] ?>" onclick="return confirm('削除してよろしいですか？')">削除</a></p>
      </td>
    </tr>
    <?php $cnt++ ?>
  <?php } ?>
</table>
</body>
</html>