<?php

  class userAccount extends database
  {
    public function loginRequest($username, $userpassword){
      $this->sendRequest("SELECT * FROM User WHERE userName = '$username' AND userPwd = '$userpassword'");
      if ($this->result->num_rows > 0) {
        return true;
      }
      else {
        return false;
      }
    }

    public function registerRequest($userName, $userPassword, $userMobile, $userEmail){
      $post = "INSERT INTO User (userName, userPwd, userMobile, userEmail)
      VALUES('$userName', '$userPassword', '$userMobile', '$userEmail')";
      if($this->conn->query($post)) {
        return true;
      }
      else{
        return false;
      }
    }
  }

?>