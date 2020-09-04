<?php 
// require_once 'class/User.php';
// $user = new User;

?>
<!DOCTYPE html>
<html lang="ja">
  <?php include('head.php'); ?>
  <body>
    <?php include('header.php'); ?>
  <div class="container">
    <!-- <form action="GetCompetitivePricingForASINSample.php" method="post"> -->
    <form action="cart_price_and_product_name_disp.php" method="post">
        <p>ASIN入力フォーム<br>
        <textarea name="asin" cols="15" rows="5"></textarea>
        <br><input type="submit">
    </form>
  </div>
</body>
</html>