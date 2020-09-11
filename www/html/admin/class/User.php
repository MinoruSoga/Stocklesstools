<?php
require_once 'Config.php';

class User extends Config{
  
  // public function insert($patient_name,$gender, $age, $birthday){
  //   $sql = "INSERT INTO patient(patient_name, gender, age, birthday) VALUES('$patient_name', '$gender', '$age', '$birthday')";
  //   $result = $this->conn->query($sql);
  //   if($result){
  //     $this->redirect_js('patient_show.php');
  //   }else{
  //     echo "Error in inserting record".$this->conn->error;
  //   }
  // }

  // public function get_patient(){
  //   //query
  //   $sql = "SELECT * FROM patient";
  //   $result = $this->conn->query($sql);

  //   //initialize an array
  //   $rows = array();
  //   if($result->num_rows > 0){
  //     while($row = $result->fetch_assoc()){
  //       $rows[] = $row;
  //     }
  //     return $rows;
  //   }
  //   else{
  //     return $this->conn->error;
  //   }
  // }
  // public function get_patient_name($patient_id){
  //   $sql = "SELECT * FROM patient WHERE id=$patient_id";
  //     $result = $this->conn->query($sql);
  
  //     if($result->num_rows > 0){
  //       $row = $result->fetch_assoc();
  //       return $row;
  //     }else{
  //       return $this->conn->error;
  //     }
  // }
  public function get_user(){
    $sql = "SELECT * FROM user WHERE auth_status='user' ";
    // $sql = "SELECT * FROM user";
    $result = $this->conn->query($sql);

    //initialize an array
    $rows = array();
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $rows[] = $row;
      }
      return $rows;
    }
    else{
      return $this->conn->error;
    }
  }
  public function login_from_admin($email, $password){
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result=$this->conn->query($sql);
    if($result->num_rows > 0){
      // session_start();
      // $row=$result->fetch_assoc();
      // $_SESSION['login_id'] = $row['id'];
      // if($result){
          $this->redirect_js("../../index.php");
      // }
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













}
?>