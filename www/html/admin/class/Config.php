<?php

// class Config
// {
//     public function __construct(){
//     $dsn = 'mysql:dbname=stockless_system;host=stocklesssalestools_db_1';
//     $user = 'root';
//     $password = 'secret';
    
//     try {
//         $dbh = new PDO($dsn, $user, $password);
//         // echo "接続成功\n";
//     } catch (PDOException $e) {
//         echo "接続失敗: " . $e->getMessage() . "\n";
//         exit();
//     }
    
// }}

class Config
{
    //properties
    private $servername = "stocklesssalestools_db_1";
    private $username = "root";
    private $password = "secret";
    private $database = "stockless_system";

    public $conn;

    public function __construct()
    {
        //Create the connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        //check connection
        if ($this->conn->connect_error) {
            die("Connection error: " . $this->conn->connect_error);

        }
        return $this->conn;
    }

    public function redirect($url)
    {
        #ob_clean - remove all output before header
        ob_clean();
        $this->redirect(" $url");
        exit;
    }
    public function redirect_js($url)
    {
        echo "<script>window.location.replace('$url')</script>";
        exit;
    }
}
