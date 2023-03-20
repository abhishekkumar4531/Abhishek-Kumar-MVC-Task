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
        header("location: /userControl");
        //$this->view("userControl");
      }
    }

    public function postData() {
      session_start();
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        if(isset($_POST['uploaded'])) {
          $comment = $_POST['newPost'];
          $img_name = $_FILES['newImage']['name'];
          $img_tmp = $_FILES['newImage']['tmp_name'];
          $img_type = $_FILES['newImage']['type'];

          if($img_type == "image/png" || $img_type == "image/jpeg" || $img_type == "image/jpg") {
            move_uploaded_file($img_tmp, "assets/uploads/". $img_name);
            //echo '<img src="http://mvc-task.com/assets/uploads/'. $img_name .'">';
          }
          else {
            echo "<script>alert('Please check file error!!!');</script>";
            $this->view("home");
          }
          $obj = new UserAccount();
          $obj->storePost($_SESSION['logged_in'], $comment, "http://mvc-task.com/assets/uploads/$img_name");
          if($obj) {
            $userPostData = $obj->showPost($_SESSION['logged_in']);
            $_SESSION['userPostedData'] = $userPostData;
            header("location: /afterLogin");
            //$this->view("home");
          }
          else {
            header("location: /afterLogin");
            //$this->view("home");
          }
        }
      }
      else {
        session_destroy();
        header("location: /userControl");
      }
    }
  }
?>
