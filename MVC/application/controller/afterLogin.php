<?php

  require '../application/model/userAccount.php';
  class AfterLogin extends Framework {

    public function index(){
      session_start();
      if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        //echo "Error";
        //$this->view("login");
        session_destroy();
        header("location: /userControl");
      }
      else {
        //echo "Success";
        $this->view("home");
      }
    }

    public function userLogout() {
      session_start();
      if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        $this->view("logout");
        //header("location: /logout");
      }
      else {
        session_destroy();
        //header("location: /login");
        $this->view("userControl");
      }
    }

    public function userProfile() {
      session_start();
      if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        $obj = new UserAccount();
        $data = $obj->showProfile($_SESSION['logged_in']);
        $_SESSION['userFirstName'] = $data[0];
        $_SESSION['userLastName'] = $data[1];
        //$_SESSION['userPassword'] = $data[2];
        $_SESSION['userMobile'] = $data[3];
        //$_SESSION['userEmail'] = $data[4];
        $_SESSION['userImageAddress'] = $data[5];
        $this->view("profile");
      }
      else {
        session_destroy();
        echo "<script>alert('First log-in!!!');</script>";
        //header("location: /userControl");
        $this->view("userControl");
      }
    }
  }
?>
