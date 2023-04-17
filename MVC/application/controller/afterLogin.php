<?php

  require '../application/model/userAccount.php';
  class AfterLogin extends Framework {

    /**
     * testInput - For validate input values.
     *
     * @param  mixed $data
     * @return void
     */
    public function testInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    /**
     * index
     * This is default function of this class.
     * Whenever AfterLogin will be initialise without other method it will be execute by default.
     * Session working flow : First start the session and vrify is user logged in or no?
     * If user logged in then go to home page other wise destroy the session and
     * go to login page. [I follow this working flow of session in entire task]
     * @return void
     */
    public function index(){
      session_start();
      if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        //$this->view("login");
        session_destroy();
        header("location: /userControl");
      }
      else {
        $this->view("home");
      }
    }

    /**
     * userLogout - For logout.
     *
     * @return void
     */
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

    /**
     * userProfile - For user profile page where user can see their profile.
     * First it will check is user logged in or not?
     * If user logged in then called a function @showProfile.
     * @showProfile will fetched all the user's details from the database and return.
     *
     * @return void
     */
    public function userProfile() {
      session_start();
      if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) {
        $obj = new UserAccount();
        //Call the @showPrifile method and it will return array type of data.
        $data = $obj->showProfile($_SESSION['logged_in']);
        //If @showProfile return not null then this statement will be execute
        if($data != null) {
          $_SESSION['userFirstName'] = $data[0];
          $_SESSION['userLastName'] = $data[1];
          //$_SESSION['userPassword'] = $data[2];
          $_SESSION['userMobile'] = $data[3];
          //$_SESSION['userEmail'] = $data[4];
          $_SESSION['userImageAddress'] = $data[5];
          $_SESSION['userBio'] = $data[6];
          $this->view("profile");
        }
        //If somehow @showProfile return null
        else {
          $this->view("profile");
        }
      }
      else {
        session_destroy();
        //echo "<script>alert('First log-in!!!');</script>";
        header("location: /userControl");
        //$this->view("userControl");
      }
    }

    /**
     * postData - When user submit the post's form then it will be execute.
     * It will also check if user is logged in or not?
     * First it will fetch all the user entered value and then check file type.
     * If all are satisfied then post data will be store in database through function
     * First call @storePost it will store user's posts in a unique table for unique user.
     * Then call @pubicPostData it will store user's post in a common table for all users.
     * After successfully post it will reload the home page and latest post will display
     * on top of the post's list.
     *
     * @return void
     */
    public function postData() {
      session_start();
      //If user logged in then continue
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
        if(isset($_POST['uploaded'])) {
          $comment = htmlspecialchars($_POST['newPost'], ENT_QUOTES);
          $img_name = $_FILES['newImage']['name'];
          $img_tmp = $_FILES['newImage']['tmp_name'];
          $img_type = $_FILES['newImage']['type'];

          //If file is image then check the image type
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
            //If image type is not valid then redirect to home page
            else {
              header("location: /afterLogin");
              //$this->view("home");
            }
          }
          //If file is video check the video type
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
          //If video type is not valid then redirect to home page
          else {
            echo "<script>alert('Please check file error!!!');</script>";
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

    public function editUserProfile() {
      session_start();
      if(isset($_POST['update'])) {
        $userEmail = $_POST['email'];
        $userBio = htmlspecialchars($_POST['user_bio'], ENT_QUOTES);
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $mobile = $_POST['mobile'];
        //$userEmail = $this->testInput($userEmail);
        $firstName = $this->testInput($firstName);
        $lastName = $this->testInput($lastName);
        $mobile = $this->testInput($mobile);
        $obj = new UserAccount();
        if(!empty($_FILES['user_img']['name'])) {
          $img_name = $_FILES['user_img']['name'];
          $img_tmp = $_FILES['user_img']['tmp_name'];
          $img_type = $_FILES['user_img']['type'];

          if($img_type == "image/png" || $img_type == "image/jpeg" || $img_type == "image/jpg") {
            move_uploaded_file($img_tmp, "assets/uploads/". $img_name);
            //echo '<img src="http://mvc-task.com/assets/uploads/'. $img_name .'">';
            $updateStatus = $obj->updateProfile($userEmail, $firstName, $lastName, $mobile, "/assets/uploads/$img_name", $userBio);
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
