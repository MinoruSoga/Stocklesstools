<?php

class Config
{
    public function __construct(){
    $dsn = 'mysql:dbname=stockless_system;host=stocklesssalestools_db_1';
    $user = 'root';
    $password = 'secret';
    
    try {
        $dbh = new PDO($dsn, $user, $password);
        // echo "接続成功\n";
    } catch (PDOException $e) {
        echo "接続失敗: " . $e->getMessage() . "\n";
        exit();
    }
    
}}