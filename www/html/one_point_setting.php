<?php 
require_once 'class/User.php';
$user = new User;

?>
<!DOCTYPE html>
<html lang="ja">
  <?php include('head.php'); ?>
  <body>
    <?php include('header.php'); ?>
    <section id="point_setting">
      <div class="w-50 mx-auto">
      <h1>Edit One Point設定</h1>
      <form class="">
        <div class="form-group ">
          <label for="point_percent">ポイント</label>
          <input type="number" class="form-control" id="point_percent">%
        </div>
        <button type="submit" class="btn btn-secondary mb-2">保存</button>

      </form>
      </div>
    </section>
  

</body>
</html>