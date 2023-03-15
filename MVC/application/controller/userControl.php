<?php
  require("../application/model/userAccount.php");
  class userControl extends framework
  {
    public function index() {
      if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        $this->view("login");
        //header("location: /login");
      }
      else {
        $this->view("home");
      }
      //header("location: /home");
    }

    public function userSignup() {
      if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        $this->view("register");
      }
      else {
        //header("location: /userControl");
        $this->view("home");
      }
    }

    public function userLogout() {
      if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        $this->view("logout");
      }
      else {
        echo "<script>alert('First log-in!!!');</script>";
        //header("location: /login");
        $this->view("userControl");
      }
    }

    public function userProfile() {
      if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        $obj = new userAccount();
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
        echo "<script>alert('First log-in!!!');</script>";
        //header("location: /userControl");
        $this->view("userControl");
      }
    }

    public function userLogin() {
      if(isset($_POST['submitLogin'])) {
        $userEmail = $_POST['useremail'];
        $userPwds = $_POST['userpassword'];

        $obj = new userAccount();
        $login_status = $obj->loginRequest($userEmail, $userPwds);
        $GLOBALS['emailErrorStatus'] = $obj->emailErrorMsg;
        $GLOBALS['pwdErrorStatus'] = $obj->pwdErrorMsg;
        if($login_status) {
          session_start();
          $GLOBALS['emailErrorStatus'] = $obj->emailErrorMsg;
          $GLOBALS['pwdErrorStatus'] = $obj->pwdErrorMsg;
          $_SESSION['logged_in'] = $userEmail;
          //echo "Logged-in";
          $this->view("home");
          //header("location: /userControl");
        }
        else {
          $GLOBALS['emailErrorStatus'] = $obj->emailErrorMsg;
          $GLOBALS['pwdErrorStatus'] = $obj->pwdErrorMsg;
          $this->view("login");
          //header("location: /login");
        }
      }
    }

    public function userRegistration() {
      if(isset($_POST['submitBtn'])){
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $password = $_POST['pwd'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $img_name = $_FILES['user_img']['name'];
        $img_tmp = $_FILES['user_img']['tmp_name'];
        $img_type = $_FILES['user_img']['type'];

        if($img_type == "image/png" || $img_type == "image/jpeg" || $img_type == "image/jpg") {
          move_uploaded_file($img_tmp, "assets/uploads/". $img_name);
          //echo '<img src="http://mvc-task.com/assets/uploads/'. $img_name .'">';
        }
        else {
          echo "<script>alert('Please check file error!!!');</script>";
          $this->view("register");
        }
        $obj = new userAccount();
        $status = $obj->registerRequest($firstName, $lastName, $password, $mobile, $email, "http://mvc-task.com/assets/uploads/$img_name");
        $GLOBALS['DuplicateErrorMsg'] = $obj->duplicateEmailMsg;
        if($status){
          $GLOBALS['DuplicateErrorMsg'] = $obj->duplicateEmailMsg;
          //echo "<br>Success!!!";
          //session_unset();
          $this->view("login");
          //header("location: /userControl");
        }
        else {
          $GLOBALS['DuplicateErrorMsg'] = $obj->duplicateEmailMsg;
          //echo "<br>Error!!!";
          $this->view("register");
          //header("location: /register");
        }
      }
    }

    public function editUserProfile() {
      if(isset($_POST['changeProfle'])) {

      }
    }

  }
?>