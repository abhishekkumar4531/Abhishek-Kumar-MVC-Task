<?php
  require '../../vendor/autoload.php';
  use PHPMailer\PHPMailer\PHPMailer;
  class UserAccount extends Database {

    public $emailErrorMsg = false;
    public $userEmailErrorMsg = false;
    public $pwdErrorMsg = false;
    public $duplicateEmailMsg = false;
    public $userData = [];
    public $allPostedData = [];
    public $otpValue;
    public $validationMsg = [];
    public function loginRequest($userEmail, $userPassword) {
      $this->sendRequest("SELECT * FROM Account WHERE UserEmail = '$userEmail'");
      if ($this->result->num_rows > 0) {
        $row = $this->result->fetch_assoc();
        if($userPassword === $row["UserPassword"]){
          $this->emailErrorMsg = false;
          $this->pwdErrorMsg = false;
          return true;
        }
        else {
          $this->pwdErrorMsg = true;
          return false;
        }
      }
      else {
        $this->emailErrorMsg = true;
        return false;
      }

      $this->conn->close();
    }

    public function registerRequest($userFirstName, $userLastName, $userPassword, $userMobile, $userEmail, $userImage) {
      $check_sql = "SELECT UserEmail FROM Account WHERE UserEmail = '$userEmail'";

      $result = $this->conn->query($check_sql);

      if ($result->num_rows > 0) {
        $this->duplicateEmailMsg = true;
        return false;
      }
      else{
        $post = "INSERT INTO Account (FirstName, LastName, UserPassword, UserMobile, UserEmail, UserImg)
        VALUES('$userFirstName', '$userLastName', '$userPassword', '$userMobile', '$userEmail', '$userImage')";
        if($this->conn->query($post)) {
          $this->duplicateEmailMsg = false;
          return true;
        }
        else {
          return false;
        }
      }
      $this->conn->close();
    }

    public function showProfile($userEmail) {
      $data = "SELECT * FROM Account WHERE UserEmail = '$userEmail'";

      $result = $this->conn->query($data);

      $row = $result->fetch_assoc();
      $userData[0]  = $row['FirstName'];
      $userData[1]  = $row['LastName'];
      $userData[2]  = $row['UserPassword'];
      $userData[3]  = $row['UserMobile'];
      $userData[4]  = $row['UserEmail'];
      $userData[5]  = $row['UserImg'];
      $userData[6]  = $row['UserBio'];

      return $userData;
      $this->conn->close();
    }

    public function storePost($userEmail, $comment, $image) {
      $verify = "SELECT UserId, FirstName FROM Account WHERE UserEmail = '$userEmail'";
      $result = $this->conn->query($verify);

      $row = $result->fetch_assoc();

      if($row > 0) {
        $connection = new mysqli($this->host, $this->user, $this->pwd, "UserPosts");
        $tableName = $row['FirstName']."".$row['UserId'];
        $checkTable = $connection->query("SHOW TABLES LIKE '$tableName'");
        if ($checkTable->num_rows == 1){
          //echo "DB is Connected <br>";
          $insert = "INSERT INTO $tableName(postComment, postImage) VALUES('$comment', '$image')";
          if($connection->query($insert)) {
            return true;
          }
          else {
            return false;
          }
        }
        else {
          $sql = "CREATE TABLE $tableName(
            postId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            postComment VARCHAR(1000)NOT NULL,
            postImage VARCHAR(500)NOT NULL
          );";
          $tableCreation = $connection->query($sql);
          if($tableCreation) {
            $insert = "INSERT INTO $tableName(postComment, postImage) VALUES('$comment', '$image')";
            if($connection->query($insert)) {
              return true;
            }
            else {
              return false;
            }
          }
        }
      }
      else {
        return false;
      }

      $connection->close();
      $this->conn->close();
    }

    public function showPost($userEmail) {
      $connection = new mysqli($this->host, $this->user, $this->pwd, "UserPosts");
      $verify = "SELECT UserId, FirstName FROM Account WHERE UserEmail = '$userEmail'";
      $result = $this->conn->query($verify);

      $row = $result->fetch_assoc();

      if($row > 0) {
        $tableName = $row['FirstName']."".$row['UserId'];
        $checkTable = $connection->query("SHOW TABLES LIKE '$tableName'");
        if($checkTable->num_rows == 1) {
          $fetchData = "SELECT postComment, postImage FROM $tableName";
          $execute = $connection->query($fetchData);
          $i=0;
          if($execute->num_rows > 0) {
            while($dataRow = $execute->fetch_assoc()){
              $this->allPostedData[$i] = $dataRow;
              $i++;
            }
            return $this->allPostedData;
          }
        }
      }
      return null;

      $connection->close();
      $this->conn->close();
    }

    public function showPublicPost($i) {
      $fetchData = "SELECT UserEmail, PostComment, PostImage FROM Posts ORDER BY PostId DESC";
      $execute = $this->conn->query($fetchData);
      $count = $i + 9;
      $i = 0;
      if($execute->num_rows > 0) {
        while($dataRow = $execute->fetch_assoc()){
          $this->allPostedData[$i] = $dataRow;
          $userInfo = "SELECT FirstName, UserImg FROM Account WHERE UserEmail = '". $this->allPostedData[$i]['UserEmail'] ."'";
          $result = $this->conn->query($userInfo);
          if($result->num_rows > 0 == 1) {
            $row = $result->fetch_assoc();
            $this->allPostedData[$i]['UserName'] = $row['FirstName'];
            $this->allPostedData[$i]['ImageAddress'] = $row['UserImg'];
          }
          $i++;
          if($i > $count) {
            return $this->allPostedData;
          }
        }
        return $this->allPostedData;
      }
      else {
        return null;
      }
      $this->conn->close();
    }

    public function publicPostData($userEmail, $postComment, $postImage) {
      $find = "SELECT UserEmail FROM Account WHERE UserEmail = '$userEmail'";
      $result = $this->conn->query($find);

      if($result->fetch_assoc() > 0) {
        $insert = "INSERT INTO Posts (UserEmail, PostComment, PostImage)
        VALUES('$userEmail', '$postComment', '$postImage')";
          if($this->conn->query($insert)) {
            return true;
          }
          else {
            return false;
          }
      }
      else {
        return false;
      }
    }

    public function verifyEmail($userEmail) {
      $find = "SELECT UserEmail FROM Account WHERE UserEmail = '$userEmail'";
      $result = $this->conn->query($find);
      $row = $result->fetch_assoc();

      if($row > 0) {
          $email = $userEmail;
          $otp = rand(100000, 999999);
          $this->otpValue = $otp;

          $mail = new PHPMailer();
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = "abhi31kr45@gmail.com";
          $mail->Password = "ylagckqsadjtgigz";
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail->Port = 587;

          $mail->setFrom("abhi31kr45@gmail.com");
          $mail->addAddress($email);
          $mail->Subject = "Reset Password!!!";
          $mail->isHTML(TRUE);
          $mail->Body = "<b>Mail content:</b> Your OTP => $otp";
          $mail->send();
          $this->userEmailErrorMsg = false;
          return true;
      }
      else {
        $this->userEmailErrorMsg = true;
        return false;
      }
    }

    public function updatePassword($userEmail, $newPwd) {
      $find = "SELECT UserEmail FROM Account WHERE UserEmail = '$userEmail'";
      $result = $this->conn->query($find);

      if($result->fetch_assoc() > 0) {
        $post = "UPDATE Account SET UserPassword = '$newPwd' WHERE UserEmail = '$userEmail'";
        if ($this->conn->query($post) === TRUE) {
          return true;
        }
        else {
          return false;
        }
      }
      else {
        return false;
      }
    }

    public function updateProfile($userEmail, $firstName, $lastName, $mobile, $userImage, $userBio) {
      $find = "SELECT UserEmail FROM Account WHERE UserEmail = '$userEmail'";
      $result = $this->conn->query($find);

      if($result->fetch_assoc() > 0) {
        $update = "UPDATE Account SET FirstName = '$firstName', LastName = '$lastName',
        UserMobile = '$mobile', UserImg = '$userImage', UserBio = '$userBio' WHERE UserEmail = '$userEmail'";
        if ($this->conn->query($update) === TRUE) {
          return true;
        }
        else {
          return false;
        }
      }
      else {
        return false;
      }
    }

    public function updateWithoutImage($userEmail, $firstName, $lastName, $mobile, $userBio) {
      $find = "SELECT UserEmail FROM Account WHERE UserEmail = '$userEmail'";
      $result = $this->conn->query($find);

      if($result->fetch_assoc() > 0) {
        $update = "UPDATE Account SET FirstName = '$firstName', LastName = '$lastName',
        UserMobile = '$mobile', UserBio = '$userBio' WHERE UserEmail = '$userEmail'";
        if ($this->conn->query($update) === TRUE) {
          return true;
        }
        else {
          return false;
        }
      }
      else {
        return false;
      }
    }

    public function newUserValidation($firstName, $lastName, $password, $mobile, $email) {
      if(preg_match("/^[A-Za-z]+$/", $firstName)) {
        $this->validationMsg['firstName'] = true;
      }
      else {
        $this->validationMsg['firstName'] = false;
      }
      if(preg_match("/^[A-Za-z]+$/", $lastName)) {
        $this->validationMsg['lastName'] = true;
      }
      else {
        $this->validationMsg['lastName'] = false;
      }
      if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/", $password)) {
        $this->validationMsg['password'] = true;
      }
      else {
        $this->validationMsg['password'] = false;
      }
      if(preg_match("/^(\+91)[0-9]{10}$/", $mobile)) {
        $this->validationMsg['mobile'] = true;
      }
      else {
        $this->validationMsg['mobile'] = false;
      }
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->validationMsg['email'] = true;
      }
      else {
        $this->validationMsg['email'] = false;
      }

      foreach($this->validationMsg as $status) {
        if($status === false) {
          return [false, $this->validationMsg];
        }
      }
      return [true, $this->validationMsg];
    }

  }

?>
