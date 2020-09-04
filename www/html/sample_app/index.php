<?php
  require 'common.php';
  $pdo = connect();
  $st = $pdo->query("SELECT * FROM asins");
  $asins = $st->fetchAll();
  require 't_index.php';
?>