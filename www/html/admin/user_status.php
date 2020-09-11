<?php 
require_once 'class/User.php';
$user = new User;
$user_data = $user->get_user();

?>
<!DOCTYPE html>
<html lang="ja">
  <?php include('head.php'); ?>
  <body>
    <?php include('header.php'); ?>
    <h1>ユーザーの状況確認</h1>
    <div class="container">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">名前</th>
      <th scope="col">登録メアド</th>
      <th scope="col">最終ログイン日</th>
      <th scope="col">支払いの有無</th>
      <th scope="col">ユーザーアカウントへログイン</th>
    </tr>
  </thead>
  <tbody>
      <?php
      foreach($user_data as $row){
      ?>
        <tr>
        <th scope="row"><?php echo $row['user_name']; ?></th>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['last_login_time']; ?></td>
        <td></td>
        <td>
            <form action="" method="post">
                <input type="hidden" name="email" value="<?echo $row['email']?>">
                <input type="hidden" name="password" value="<?echo $row['password']?>">
                <button type="submit" class="btn btn-outline-primary" name="login_to_user">>></button>
            </form>

        </td>
        </tr>

      <?php
      }
      ?>
  </tbody>
</table>
    </div>
  

</body>
</html>

<?php
  if(isset($_POST['login_to_user'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user->login_from_admin($email, $password);
  }

?>