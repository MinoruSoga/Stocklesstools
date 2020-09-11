<?php 
session_start();
require_once 'class/User.php';
$user = new User;
$login_id = $_SESSION['login_id'];
echo $_SESSION['login_id'];

?>
<!DOCTYPE html>
<html lang="ja">
  <?php include('head.php'); ?>
  <body>
    <?php include('header.php'); ?>
    <h1>プロフィール</h1>
    <h1>--<?php echo $login_id;?></h1>
  

</body>
</html>