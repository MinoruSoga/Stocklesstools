<?php
session_start();
var_dump($_SESSION) ;
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
  
<h1>top</h1>
<h1><?php print_r($_SESSION) ?></h1>
</body>
</html>