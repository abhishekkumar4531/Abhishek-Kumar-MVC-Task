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
        header("location: /userControl");
        //$this->view("userControl");
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
        $_SESSION['userBio'] = $data[6];
        $this->view("profile");
      }
      else {
        session_destroy();
        //echo "<script>alert('First log-in!!!');</script>";
        header("location: /userControl");
        //$this->view("userControl");
      }
    }

    public function postData() {
      session_start();
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        if(isset($_POST['uploaded'])) {
          $comment = htmlspecialchars($_POST['newPost'], ENT_QUOTES);
          $img_name = $_FILES['newImage']['name'];
          $img_tmp = $_FILES['newImage']['tmp_name'];
          $img_type = $_FILES['newImage']['type'];

          if($img_type == "image/png" || $img_type == "image/jpeg" || $img_type == "image/jpg" || $img_type == "image/gif") {
            move_uploaded_file($img_tmp, "assets/uploads/". $img_name);
            //echo '<img src="http://mvc-task.com/assets/uploads/'. $img_name .'">';
            $obj = new UserAccount();
            $status = $obj->storePost($_SESSION['logged_in'], $comment, $img_type, $img_name);
            $store = $obj->publicPostData($_SESSION['logged_in'], $comment, $img_type, $img_name);
            if($store) {
              $userPostData = $obj->showPost($_SESSION['logged_in']);
              $userPostData = $obj->showPublicPost(0);
              $_SESSION['userPostedData'] = $userPostData;
              header("location: /afterLogin");
            }
            else {
              header("location: /afterLogin");
              //$this->view("home");
            }
          }
          else if($img_type == "video/wmv" || $img_type == "video/avi" || $img_type == "video/mpeg" || $img_type == "video/mpg" || $img_type == "video/mp4") {
            move_uploaded_file($img_tmp, "assets/videos/". $img_name);
            //echo '<img src="http://mvc-task.com/assets/uploads/'. $img_name .'">';
            $obj = new UserAccount();
            $status = $obj->storePost($_SESSION['logged_in'], $comment, $img_type, $img_name);
            $store = $obj->publicPostData($_SESSION['logged_in'], $comment, $img_type, $img_name);
            if($store) {
              $userPostData = $obj->showPost($_SESSION['logged_in']);
              $userPostData = $obj->showPublicPost(0);
              $_SESSION['userPostedData'] = $userPostData;
              header("location: /afterLogin");
            }
            else {
              header("location: /afterLogin");
              //$this->view("home");
            }
          }
          else {
            echo "<script>alert('Please check file error!!!');</script>";
            $this->view("home");
            //header("location: /afterLogin");
          }
        }
      }
      else {
        session_destroy();
        header("location: /userControl");
      }
    }

    public function editUserProfile() {
      session_start();
      if(isset($_POST['update'])) {
        $userEmail = $_POST['email'];
        $userBio = htmlspecialchars($_POST['user_bio'], ENT_QUOTES);
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $mobile = $_POST['mobile'];
        $obj = new UserAccount();
        if(!empty($_FILES['user_img']['name'])) {
          $img_name = $_FILES['user_img']['name'];
          $img_tmp = $_FILES['user_img']['tmp_name'];
          $img_type = $_FILES['user_img']['type'];

          if($img_type == "image/png" || $img_type == "image/jpeg" || $img_type == "image/jpg") {
            move_uploaded_file($img_tmp, "assets/uploads/". $img_name);
            //echo '<img src="http://mvc-task.com/assets/uploads/'. $img_name .'">';
            $updateStatus = $obj->updateProfile($userEmail, $firstName, $lastName, $mobile, "assets/uploads/$img_name", $userBio);
            if($updateStatus) {
              //$this->userProfile();
              header("location: /afterLogin/userProfile");
            }
            else {
              //$this->userProfile();
              header("location: /afterLogin/userProfile");
            }
          }
          else {
            echo "<script>alert('Please check image file type !!!');</script>";
            $this->view("profile");
            //header("location: /afterLogin/userProfile");
          }
        }
        else {
          $updateStatus = $obj->updateWithoutImage($userEmail, $firstName, $lastName, $mobile, $userBio);
          if($updateStatus) {
            //$this->userProfile();
            header("location: /afterLogin/userProfile");
          }
          else {
            //$this->userProfile();
            header("location: /afterLogin/userProfile");
          }
        }
      }
      else {
        session_destroy();
        header("location: /userControl");
      }
    }

    public function loadMoreContent() {
      session_start();
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        if(!empty($_SESSION['userPostedData'])) {
          $count = count($_SESSION['userPostedData']);
          $obj = new UserAccount;
          $userPostData = $obj->showPublicPost($count);
          $_SESSION['userPostedData'] = $userPostData;
          include "../application/view/components/userPostedData.php";
        }
        else {
          //$this->view("home");
          header("location: /afterLogin");
        }
        //$this->view("home");
      }
      else {
        session_destroy();
        header("location: /userControl");
      }
    }

    public function loadInitialContent() {
      session_start();
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        $obj = new UserAccount;
        $userPostData = $obj->showPublicPost(0);
        $_SESSION['userPostedData'] = $userPostData;
        include "../application/view/components/userPostedData.php";
        //$this->view("home");
      }
      else {
        session_destroy();
        header("location: /userControl");
      }
    }

    public function userPosts() {
      session_start();
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        $obj = new UserAccount;
        $userData = $obj->showPost($_SESSION['logged_in']);
        $_SESSION['userPersonalPosts'] = $userData;
        $this->view("account");
      }
      else {
        session_destroy();
        header("location: /userControl");
      }
    }

    public function profiles($userId) {
      session_start();
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        $obj = new UserAccount;
        $userData = $obj->getOthersProfile($userId);
        if($userData != null) {
          $GLOBALS['userInfo'] = $userData[0];
          if($userData[1] != null) {
            $GLOBALS['userPosts'] = $userData[1];
          }
          else {
            unset($GLOBALS['userPosts']);
          }
          $this->view("user");
        }
        else {
          unset($GLOBALS['userInfo']);
          unset($GLOBALS['userPosts']);
          header("location: /afterLogin");
        }
      }
      else {
        session_destroy();
        header("location: /userControl");
      }
    }

  }
?>
