<?php

  class userAccount extends database
  {
    public $emailErrorMsg = false;
    public $pwdErrorMsg = false;
    public $duplicateEmailMsg = false;
    public function loginRequest($userEmail, $userPassword){
      $this->sendRequest("SELECT * FROM Account WHERE UserEmail = '$userEmail'");
      if ($this->result->num_rows > 0) {
        $row = $this->result->fetch_assoc();
        if($userPassword === $row["UserPassword"]){
          $this->emailErrorMsg = false;
          $this->pwdErrorMsg = false;
          return true;
        }
        else{
          $this->pwdErrorMsg = true;
          return false;
        }
      }
      else {
        $this->emailErrorMsg = true;
        return false;
      }
    }

    public function registerRequest($userFirstName, $userLastName, $userPassword, $userMobile, $userEmail, $userImage){
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
        else{
          return false;
        }
      }
    }

    public function showProfile($userEmail){
      $data = "SELECT * FROM Account WHERE UserEmail = '$userEmail'";

      $result = $this->conn->query($data);

      $row = $result->fetch_assoc();
      $userData[0]  = $row['FirstName'];
      $userData[1]  = $row['LastName'];
      $userData[2]  = $row['UserPassword'];
      $userData[3]  = $row['UserMobile'];
      $userData[4]  = $row['UserEmail'];
      $userData[5]  = $row['UserImg'];

      return $userData;
    }
  }

?>