<?php
  require("../application/model/userAccount.php");
  class userControl extends framework
  {
    public function index(){
      header("location: /home");
    }

    public function userLogin(){
      $userNames = $_POST['username'];
      $userPwds = $_POST['userpassword'];
      $obj = new userAccount();
      $re_result = $obj->loginRequest($userNames, $userPwds);
      if($re_result===true){
        $_SESSION['logged_in'] = $userNames;
        header("location: /home");
      }
      else{
        session_unset();
        header("location: /login");
      }
    }

    public function userRegistration(){
      $firstName = $_POST['first_name'];
      $lastName = $_POST['last_name'];
      $password = $_POST['pwd'];
      $mobile = $_POST['mobile'];
      $email = $_POST['email'];
      //$image = $_POST['user_img'];
      $obj = new userAccount();
      $status = $obj->registerRequest($firstName, $password, $mobile, $email);
      if($status){
        header("location: /login");
      }
      else{
        header("location: /register");
      }
    }
  }

?>