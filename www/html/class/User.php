<?php
require_once 'Config.php';

class User extends Config{

  public function login($email, $password){
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result=$this->conn->query($sql);
    if($result->num_rows > 0){

      // session_destroy();
      if(!headers_sent() && '' == session_id() ) {
        session_start();
      }
      $row=$result->fetch_assoc();
      $_SESSION['login_id'] = $row['user_id'];
      $auth_status = $row['auth_status'];
      $now = date('Y-m-d H:i:s');
      $user_id = $row['user_id'];
      $sql = "UPDATE user SET last_login_time = '$now' WHERE user_id = '$user_id'";
      $result=$this->conn->query($sql);
      if($result){
        if($auth_status == 'admin'){
          $this->redirect_js("../admin/index.php");
        }else{ 
          $this->redirect_js("../index.php");
        }
      }
      // header("Location: index.php");
      // if($row['permission'] == 'admin'){
      //   $this->redirect_js("admin/index.php");
      //   // echo $_SESSION['user_id'];
      // }
      // elseif($row['permission'] == 'user'){
      //   $this->redirect_js('user/index.php');
      //   // echo $_SESSION['user_id'];
      // }
    }
    else{
      echo "Invalid Username or Password";
    }
  }
  public function get_user_prof($user_id){
    $sql = "SELECT * FROM user WHERE user_id='$user_id' ";
    $result = $this->conn->query($sql);

    if($result->num_rows > 0){
      $row = $result->fetch_assoc();
      return $row;
    }else{
      return $this->conn->error;
    }
  }
  public function logout(){
    session_start();
    session_destroy();
    $this->redirect_js('../login.php');
  }














}
?>