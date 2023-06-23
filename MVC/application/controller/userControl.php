<?php
  require '../application/model/userAccount.php';
  //require_once '../../vendor/autoload.php';
  class UserControl extends Framework {

    public function testInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    public function index() {
      session_start();
      if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        if(!isset($_SESSION['storeOtp'])) {
          session_destroy();
        }
        $this->view("login");
        //header("location: /login");
      }
      else {
        header("location: /afterLogin");
        //header("location: /home");
      }
    }

    public function loginWithGoogle() {
      session_start();
      require "../config/googleConfig.php";
      if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        if(isset($_GET["code"])){

          $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


          if(!isset($token['error'])) {

            $google_client->setAccessToken($token['access_token']);

            $_SESSION['access_token'] = $token['access_token'];

            $google_service = new Google_Service_Oauth2($google_client);

            $data = $google_service->userinfo->get();

            $_SESSION['userFirstName'] = $data['given_name'];
            $_SESSION['userLastName'] = $data['family_name'];
            $_SESSION['logged_in'] = $data['email'];
            //   $_SESSION['user_gender'] = $data['gender'];
            $_SESSION['userImageAddress'] = $data['picture'];
            header("location: /afterLofin");
          }
        }
        else {
          session_destroy();
          header("location: /userControl");
        }
      }
      else {
        header("location: /afterLogin");
        //$this->view("home");
      }
    }

    public function userSignup() {
      session_start();
      if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        session_destroy();
        $this->view("register");
      }
      else {
        header("location: /afterLogin");
        //$this->view("home");
      }
    }

    public function sendOTP() {
      session_start();
      if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        session_destroy();
        $this->view("sendotp");
      }
      else {
        header("location: /afterLogin");
        //$this->view("home");
      }
    }

    public function userLogin() {
      if(isset($_POST['submitLogin'])) {
        $userEmail = $_POST['useremail'];
        $userPwds = $_POST['userpassword'];

        $userEmail = $this->testInput($userEmail);
        $userPwds = $this->testInput($userPwds);

        $obj = new UserAccount();
        $login_status = $obj->loginRequest($userEmail, $userPwds);
        $GLOBALS['emailErrorStatus'] = $obj->emailErrorMsg;
        $GLOBALS['pwdErrorStatus'] = $obj->pwdErrorMsg;
        if($login_status) {
          session_start();
          //$GLOBALS['checkLogin'] = true;
          $GLOBALS['emailErrorStatus'] = $obj->emailErrorMsg;
          $GLOBALS['pwdErrorStatus'] = $obj->pwdErrorMsg;
          $_SESSION['logged_in'] = $userEmail;

          //$userPostData = $obj->showPost($_SESSION['logged_in']);
          $userPostData = $obj->showPublicPost(0);
          $_SESSION['userPostedData'] = $userPostData;

          $data = $obj->showProfile($_SESSION['logged_in']);
          $_SESSION['userFirstName'] = $data[0];
          $_SESSION['userLastName'] = $data[1];
          //$_SESSION['userPassword'] = $data[2];
          $_SESSION['userMobile'] = $data[3];
          //$_SESSION['userEmail'] = $data[4];
          $_SESSION['userImageAddress'] = $data[5];
          $_SESSION['userBio'] = $data[6];
          //$this->view("home");
          header("location: /afterLogin");
        }
        else {
          $GLOBALS['emailErrorStatus'] = $obj->emailErrorMsg;
          $GLOBALS['pwdErrorStatus'] = $obj->pwdErrorMsg;
          $this->view("login");
          //header("location: /userControl");
        }
      }
      else {
        //$this->view("login");
        header("location: /userControl");
      }
    }

    public function userRegistration() {
      if(isset($_POST['submitBtn'])) {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $password = $_POST['pwd'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $firstName = $this->testInput($firstName);
        $lastName = $this->testInput($lastName);
        $password = $this->testInput($password);
        $mobile = $this->testInput($mobile);
        $email = $this->testInput($email);
        if(isset($_POST['cookieStatus'])) {
          $cookieStatus = $_POST['cookieStatus'];
        }
        else {
          $cookieStatus = "Denied";
        }
        $obj = new UserAccount();
        $status = $obj->newUserValidation($firstName, $lastName, $password, $mobile, $email);
        if($status[0]) {
          $GLOBALS['firstNameError'] = $status[1]['firstName'];
          $GLOBALS['lastNameError'] = $status[1]['lastName'];
          $GLOBALS['passwordError'] = $status[1]['password'];
          $GLOBALS['mobileError'] = $status[1]['mobile'];
          $GLOBALS['emailError'] = $status[1]['email'];
          $img_name = $_FILES['user_img']['name'];
          $img_tmp = $_FILES['user_img']['tmp_name'];
          $img_type = $_FILES['user_img']['type'];

          if($img_type == "image/png" || $img_type == "image/jpeg" || $img_type == "image/jpg") {
            $GLOBALS['imageError'] = false;
            move_uploaded_file($img_tmp, "assets/uploads/". $img_name);
            //echo '<img src="http://mvc-task.com/assets/uploads/'. $img_name .'">';
            $status = $obj->registerRequest($firstName, $lastName, $password, $mobile, $email, "/assets/uploads/$img_name", $cookieStatus);
            $GLOBALS['DuplicateErrorMsg'] = $obj->duplicateEmailMsg;
            if($status){
              $GLOBALS['DuplicateErrorMsg'] = $obj->duplicateEmailMsg;
              //$this->view("login");
              header("location: /userControl");
            }
            else {
              $GLOBALS['DuplicateErrorMsg'] = $obj->duplicateEmailMsg;
              $this->view("register");
              //header("location: /userControl/userSignup");
            }
          }
          else {
            $GLOBALS['imageError'] = true;
            $this->view("register");
            //header("location: /userControl/userSignup");
          }
        }
        else {
          $GLOBALS['firstNameError'] = $status[1]['firstName'];
          $GLOBALS['lastNameError'] = $status[1]['lastName'];
          $GLOBALS['passwordError'] = $status[1]['password'];
          $GLOBALS['mobileError'] = $status[1]['mobile'];
          $GLOBALS['emailError'] = $status[1]['email'];
          $this->view("register");
        }
      }
      else {
        header("location: /userControl/userSignup");
      }
    }

    public function resetPwd() {
      if(isset($_POST['sendOtp'])) {
        $obj = new UserAccount();
        $userEmail = $_POST['user_email'];
        $userEmail = $this->testInput($userEmail);
        $verify = $obj->verifyEmail($userEmail);
        $GLOBALS['userEmailErrorStatus'] = $obj->userEmailErrorMsg;
        if($verify) {
          session_start();
          $GLOBALS['userEmailErrorStatus'] = $obj->userEmailErrorMsg;
          $_SESSION['storeOtp'] = $obj->otpValue;
          $_SESSION['resetUserEmail'] = $_POST['user_email'];
          $userValues = $obj->showProfile($_POST['user_email']);
          $GLOBALS['userName'] = $userValues[0] ." ". $userValues[1];
          //echo "OTP is ". $_SESSION['storeOtp'];
          $this->view("reset");
        }
        else {
          $GLOBALS['userEmailErrorStatus'] = $obj->userEmailErrorMsg;
          //$this->view("sendotp");
          header("location: /userControl/sendOTP");
        }
      }
      else {
        header("location: /userControl/sendOTP");
      }
    }

    public function resetPassword() {
      if(isset($_POST['resetPwd'])) {
        session_start();
        $getOtp = $_POST['otp'];
        $getOtp = $this->testInput($getOtp);
        if(isset($_SESSION['storeOtp'])) {
          if(number_format($_SESSION['storeOtp']) === number_format($getOtp)) {
            $obj = new UserAccount();
            $update = $obj->updatePassword($_SESSION['resetUserEmail'], $_POST['newPassword']);
            if($update) {
              session_destroy();
              header("location: /userControl");
            }
            else {
              session_destroy();
              //$this->view("sendotp");
              header("location: /userControl/sendOTP");
            }
          }
          else {
            session_destroy();
            //$this->view("sendotp");
            header("location: /userControl/sendOTP");
          }
        }
        else {
          session_destroy();
          header("location: /userControl/sendOTP");
        }
      }
      else {
        //$this->view("sendotp");
        header("location: /userControl/sendOTP");
      }
    }

  }
?>
