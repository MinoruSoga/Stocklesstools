<?php
  function connect() {
    $dsn = "mysql:dbname=stockless_system;host=stocklesssalestools_db_1;charset=utf8;";
    $user = 'root';
    $password = 'secret';
	return new PDO($dsn, $user, $password);
  }
?>